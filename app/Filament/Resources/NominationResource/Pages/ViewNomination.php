<?php

namespace App\Filament\Resources\NominationResource\Pages;

use App\Filament\Resources\NominationResource;
use Filament\Actions;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewNomination extends ViewRecord
{
    protected static string $resource = NominationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('assign_judge')
                ->label('Assign Judge')
                ->icon('heroicon-m-user-plus')
                ->visible(fn() => auth()->user()->hasRole(['admin', 'super_admin']))
                ->form([
                    Forms\Components\Select::make('judge_id')
                        ->label('Select Judge')
                        ->options(\App\Models\User::role('judge')->pluck('name', 'id'))
                        ->searchable()
                        ->default(fn(\App\Models\Nomination $record) => $record->judge_id) // Pre-select
                        ->required(),
                ])
                ->action(function (array $data, \App\Models\Nomination $record) {
                    $record->update(['judge_id' => $data['judge_id']]);
                    \Filament\Notifications\Notification::make()->title('Judge assigned successfully')->success()->send();
                }),

            Actions\Action::make('evaluate')
                ->label('Evaluate Nomination')
                ->icon('heroicon-m-clipboard-document-check')
                ->color('primary')
                ->visible(
                    fn(\App\Models\Nomination $record) =>
                    (auth()->user()->hasRole(['admin', 'super_admin']) || $record->judge_id === auth()->id())
                )
                ->fillForm(function (\App\Models\Nomination $record): array {
                    $judgeId = $record->judge_id ?? auth()->id();
                    $existing = \App\Models\NominationEvaluation::where('nomination_id', $record->id)
                        ->where('user_id', $judgeId)
                        ->first();

                    return $existing ? $existing->toArray() : [];
                })
                ->steps($this->getEvaluationSteps())
                ->action(function (array $data, \App\Models\Nomination $record) {
                    $this->processEvaluation($data, $record);
                }),

            Actions\Action::make('download_pdf')
                ->label('Download PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(fn(): string => route('nomination.pdf', $this->record->application_id))
                ->openUrlInNewTab()
                ->color('success'),
        ];
    }

    protected function getEvaluationSteps(): array
    {
        $steps = [];
        for ($phase = 1; $phase <= 6; $phase++) {
            $criteria = \App\Models\EvaluationCriterion::where('phase', $phase)->get();

            $options = $criteria->mapWithKeys(function ($criterion) {
                return [$criterion->grade_letter => "Grade {$criterion->grade_letter}: {$criterion->label}" . ($criterion->is_rejection ? ' (Reject)' : '')];
            })->toArray();

            $descriptions = $criteria->mapWithKeys(function ($criterion) {
                return [$criterion->grade_letter => $criterion->description];
            });

            $steps[] = Step::make("phase_{$phase}")
                ->label("Phase {$phase}")
                ->visible(function (Forms\Get $get) use ($phase) {
                    if ($phase === 1)
                        return true;
                    for ($p = 1; $p < $phase; $p++) {
                        $prevGrade = $get("phase_{$p}_grade");
                        if (self::isRejection($p, $prevGrade))
                            return false;
                    }
                    return true;
                })
                ->schema([
                    Forms\Components\Radio::make("phase_{$phase}_grade")
                        ->label("Phase {$phase} Grade")
                        ->options($options)
                        ->descriptions($descriptions)
                        ->required()
                        ->live(),

                    Forms\Components\TextInput::make("phase_{$phase}_score")
                        ->label("Score")
                        ->numeric()
                        ->required(fn(Forms\Get $get) => $phase > 1 && !self::isRejection($phase, $get("phase_{$phase}_grade")))
                        ->visible(fn(Forms\Get $get) => $phase > 1 && $get("phase_{$phase}_grade") && !self::isRejection($phase, $get("phase_{$phase}_grade")))
                        ->minValue(fn(Forms\Get $get) => self::getMinScore($phase, $get("phase_{$phase}_grade")))
                        ->maxValue(fn(Forms\Get $get) => self::getMaxScore($phase, $get("phase_{$phase}_grade")))
                ]);
        }

        $steps[] = Step::make('final_remarks')
            ->label('Final Remarks')
            ->schema([
                Forms\Components\Textarea::make('remarks')->label('Overall Remarks')->required(),
            ]);

        return $steps;
    }

    protected static function isRejection($phase, $grade): bool
    {
        if (!$grade)
            return false;
        $c = \App\Models\EvaluationCriterion::where('phase', $phase)->where('grade_letter', $grade)->first();
        return $c ? $c->is_rejection : false;
    }

    protected static function getMinScore($phase, $grade)
    {
        if (!$grade)
            return 0;
        $c = \App\Models\EvaluationCriterion::where('phase', $phase)->where('grade_letter', $grade)->first();
        return $c ? $c->min_score : 0;
    }

    protected static function getMaxScore($phase, $grade)
    {
        if (!$grade)
            return 100;
        $c = \App\Models\EvaluationCriterion::where('phase', $phase)->where('grade_letter', $grade)->first();
        return $c ? $c->max_score : 100;
    }

    protected function processEvaluation(array $data, \App\Models\Nomination $record)
    {
        // Calculate Logic
        $isRejected = false;
        $totalScore = 0;
        $scorablePhases = 0;

        // Phase 1 Rejection Check
        $p1Grade = $data['phase_1_grade'] ?? null;
        if (self::isRejection(1, $p1Grade)) {
            $isRejected = true;
        }

        // Phase 2 to 6 Scorable
        for ($i = 2; $i <= 6; $i++) {
            $grade = $data["phase_{$i}_grade"] ?? null;
            if (self::isRejection($i, $grade)) {
                $isRejected = true;
            }
            if (isset($data["phase_{$i}_score"])) {
                $totalScore += (int) $data["phase_{$i}_score"];
                $scorablePhases++;
            }
        }

        // Average of scored phases (Phase 2-6)
        $finalScore = $scorablePhases > 0 ? ($totalScore / $scorablePhases) : 0;

        $finalGrade = 'D';
        if (!$isRejected) {
            if ($finalScore >= 90)
                $finalGrade = 'A';
            elseif ($finalScore >= 80)
                $finalGrade = 'B';
            elseif ($finalScore >= 70)
                $finalGrade = 'C';
            else {
                $finalGrade = 'D';
                $isRejected = true; // < 70 is rejection
            }
        } else {
            $finalGrade = 'D';
        }

        // Determine User ID (Judge or Auth)
        $targetUserId = $record->judge_id ?? auth()->id();

        // Save Evaluation (UpdateOrCreate)
        \App\Models\NominationEvaluation::updateOrCreate(
            [
                'nomination_id' => $record->id,
                'user_id' => $targetUserId,
            ],
            [
                'phase_1_grade' => $data['phase_1_grade'] ?? null,
                'phase_2_grade' => $data['phase_2_grade'] ?? null,
                'phase_2_score' => $data['phase_2_score'] ?? null,
                'phase_3_grade' => $data['phase_3_grade'] ?? null,
                'phase_3_score' => $data['phase_3_score'] ?? null,
                'phase_4_grade' => $data['phase_4_grade'] ?? null,
                'phase_4_score' => $data['phase_4_score'] ?? null,
                'phase_5_grade' => $data['phase_5_grade'] ?? null,
                'phase_5_score' => $data['phase_5_score'] ?? null,
                'phase_6_grade' => $data['phase_6_grade'] ?? null,
                'phase_6_score' => $data['phase_6_score'] ?? null,
                'remarks' => $data['remarks'] ?? null,
            ]
        );

        // Update Nomination
        $record->update([
            'status' => $isRejected ? 'rejected' : 'awarded',
            'final_score' => $finalScore,
            'final_grade' => $finalGrade,
        ]);

        \Filament\Notifications\Notification::make()
            ->title($isRejected ? 'Nomination Rejected' : 'Nomination Evaluated Successfully')
            ->body("Final Score: " . number_format($finalScore, 2) . " (Grade: $finalGrade)")
            ->status($isRejected ? 'danger' : 'success')
            ->send();
    }
}

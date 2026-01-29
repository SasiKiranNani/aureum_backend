<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            // Phase 1: RELEVANCE AND ELIGIBILITY
            ['phase' => 1, 'grade_letter' => 'A', 'label' => 'Category Fit', 'description' => 'Strong alignment with category definitions.', 'min_score' => null, 'max_score' => null, 'is_rejection' => false],
            ['phase' => 1, 'grade_letter' => 'B', 'label' => 'Scope Alignment', 'description' => 'Good alignment with scope.', 'min_score' => null, 'max_score' => null, 'is_rejection' => false],
            ['phase' => 1, 'grade_letter' => 'C', 'label' => 'Misalignment', 'description' => 'Does not fit category or scope. Not award-eligible.', 'min_score' => null, 'max_score' => null, 'is_rejection' => true],

            // Phase 2: SUBSTANCE OF CONTRIBUTION
            ['phase' => 2, 'grade_letter' => 'A', 'label' => 'Foundational', 'description' => 'Creates new capability or standard.', 'min_score' => 90, 'max_score' => 100, 'is_rejection' => false],
            ['phase' => 2, 'grade_letter' => 'B', 'label' => 'Substantial', 'description' => 'Significant Advancement.', 'min_score' => 80, 'max_score' => 89, 'is_rejection' => false],
            ['phase' => 2, 'grade_letter' => 'C', 'label' => 'Incremental', 'description' => 'Improvement of Existing work.', 'min_score' => 70, 'max_score' => 79, 'is_rejection' => false],
            ['phase' => 2, 'grade_letter' => 'D', 'label' => 'Routine', 'description' => 'Routine professional Output. Not award-eligible.', 'min_score' => 60, 'max_score' => 69, 'is_rejection' => true],

            // Phase 3: ORIGINALITY AND OWNERSHIP
            ['phase' => 3, 'grade_letter' => 'A', 'label' => 'Indispensable', 'description' => 'Could not exist without Nominee.', 'min_score' => 90, 'max_score' => 100, 'is_rejection' => false],
            ['phase' => 3, 'grade_letter' => 'B', 'label' => 'Primary', 'description' => 'Nominee drove the outcome.', 'min_score' => 80, 'max_score' => 89, 'is_rejection' => false],
            ['phase' => 3, 'grade_letter' => 'C', 'label' => 'Shared', 'description' => 'Credit is distributed.', 'min_score' => 70, 'max_score' => 79, 'is_rejection' => false],
            ['phase' => 3, 'grade_letter' => 'D', 'label' => 'Marginal', 'description' => 'Limited / advisory Input. Ineligible for top recognition.', 'min_score' => 60, 'max_score' => 69, 'is_rejection' => true],

            // Phase 4: IMPACT REALIZATION
            ['phase' => 4, 'grade_letter' => 'A', 'label' => 'Transformational', 'description' => 'Changed Practice or outcomes meaningfully.', 'min_score' => 90, 'max_score' => 100, 'is_rejection' => false],
            ['phase' => 4, 'grade_letter' => 'B', 'label' => 'Material', 'description' => 'Clear, Measurable Benefits.', 'min_score' => 80, 'max_score' => 89, 'is_rejection' => false],
            ['phase' => 4, 'grade_letter' => 'C', 'label' => 'Localized', 'description' => 'Limited but real effect.', 'min_score' => 70, 'max_score' => 79, 'is_rejection' => false],
            ['phase' => 4, 'grade_letter' => 'D', 'label' => 'Unrealized', 'description' => 'Intent without evidence. Rejection.', 'min_score' => 60, 'max_score' => 69, 'is_rejection' => true],

            // Phase 5: CREDIBILITY AND VERIFICATION
            ['phase' => 5, 'grade_letter' => 'A', 'label' => 'Externally Validated', 'description' => 'Independent, Verifiable Proof.', 'min_score' => 90, 'max_score' => 100, 'is_rejection' => false],
            ['phase' => 5, 'grade_letter' => 'B', 'label' => 'Documented', 'description' => 'Strong Internal Records.', 'min_score' => 80, 'max_score' => 89, 'is_rejection' => false],
            ['phase' => 5, 'grade_letter' => 'C', 'label' => 'Partially Substantiated', 'description' => 'Some Evidence Gaps.', 'min_score' => 70, 'max_score' => 79, 'is_rejection' => false],
            ['phase' => 5, 'grade_letter' => 'D', 'label' => 'Unsubstantiated', 'description' => 'Claims without Proofs. Rejection.', 'min_score' => 60, 'max_score' => 69, 'is_rejection' => true],

            // Phase 6: LONG TERM SIGNIFICANCE
            ['phase' => 6, 'grade_letter' => 'A', 'label' => 'Enduring', 'description' => 'Likely relevant 5-10 Years.', 'min_score' => 90, 'max_score' => 100, 'is_rejection' => false],
            ['phase' => 6, 'grade_letter' => 'B', 'label' => 'Sustained', 'description' => 'Multi – Year Relevance.', 'min_score' => 80, 'max_score' => 89, 'is_rejection' => false],
            ['phase' => 6, 'grade_letter' => 'C', 'label' => 'Time Bond', 'description' => 'Short Term Value.', 'min_score' => 70, 'max_score' => 79, 'is_rejection' => false],
            ['phase' => 6, 'grade_letter' => 'D', 'label' => 'Transient', 'description' => 'Trend- Based. Rejection.', 'min_score' => 60, 'max_score' => 69, 'is_rejection' => true],
        ];

        foreach ($criteria as $criterion) {
            \App\Models\EvaluationCriterion::updateOrCreate(
                [
                    'phase' => $criterion['phase'],
                    'grade_letter' => $criterion['grade_letter'],
                ],
                $criterion
            );
        }
    }
}

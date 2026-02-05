<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessSeasonEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-season-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send automatic emails to winners and rejected nominees when a season ends.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->startOfDay();

        // Find seasons that have ended and haven't had all mails sent
        $seasons = \App\Models\Season::where('mail_sent', false)
            ->where('closing_date', '<=', $today)
            ->get();

        if ($seasons->isEmpty()) {
            $this->info('No seasons found that require email processing.');

            return;
        }

        foreach ($seasons as $season) {
            $this->info("Processing season: {$season->name}");

            // Get nominations for this season that haven't received mail yet
            $nominations = \App\Models\Nomination::where('season_id', $season->id)
                ->where('mail_sent', false)
                ->get();

            if ($nominations->isEmpty()) {
                $season->update(['mail_sent' => true]);
                $this->info("All nominations for season {$season->name} already processed.");

                continue;
            }

            foreach ($nominations as $nomination) {
                try {
                    // Winner logic: status approved/awarded, has badge_id and badge_name
                    if (in_array($nomination->status, ['approved', 'awarded']) && $nomination->badge_id && $nomination->badge_name) {
                        \Illuminate\Support\Facades\Mail::to($nomination->email)
                            ->send(new \App\Mail\WinnerAnnouncementMail($nomination));

                        $nomination->update(['mail_sent' => true]);
                        $this->info("Sent winner mail to: {$nomination->email}");
                    }
                    // All other nominations (rejected, pending, etc.) receive rejection mail
                    else {
                        \Illuminate\Support\Facades\Mail::to($nomination->email)
                            ->send(new \App\Mail\NominationRejectedMail($nomination));

                        $nomination->update(['mail_sent' => true]);
                        $this->info("Sent rejection mail to: {$nomination->email}");
                    }
                } catch (\Exception $e) {
                    $this->error("Failed to send mail to {$nomination->email}: ".$e->getMessage());
                }
            }

            // Check if all nominations for this season are now processed
            $remaining = \App\Models\Nomination::where('season_id', $season->id)
                ->where('mail_sent', false)
                ->count();

            if ($remaining === 0) {
                $season->update(['mail_sent' => true]);
                $this->info("Season {$season->name} marks as mail_sent = true.");
            }
        }
    }
}

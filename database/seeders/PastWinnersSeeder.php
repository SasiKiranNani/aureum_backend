<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Category;
use App\Models\Nomination;
use App\Models\Season;
use Illuminate\Database\Seeder;

class PastWinnersSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create a Past Season (e.g., 2024)
        $pastSeason = Season::firstOrCreate(
            ['name' => '2024 Season'],
            [
                'opening_date' => now()->subYear()->startOfYear(),
                'closing_date' => now()->subYear()->endOfYear(),
                'application_deadline_date' => now()->subYear()->endOfYear(),
                'is_active' => false,
            ]
        );

        // 2. Ensure Badges exist
        $goldBadge = Badge::firstOrCreate(['name' => 'Gold'], ['min_score' => 90, 'max_score' => 100, 'is_active' => true]);
        $silverBadge = Badge::firstOrCreate(['name' => 'Silver'], ['min_score' => 80, 'max_score' => 89, 'is_active' => true]);
        $bronzeBadge = Badge::firstOrCreate(['name' => 'Bronze'], ['min_score' => 70, 'max_score' => 79, 'is_active' => true]);

        // 3. Create Nominations for the Past Season
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $category = Category::create(['name' => 'Technology Innovation']);
            $categories = collect([$category]);
        }

        // Create 5 Gold Winners
        for ($i = 0; $i < 5; $i++) {
            Nomination::create([
                'season_id' => $pastSeason->id,
                'application_id' => 'AUR-2024-G' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'full_name' => fake()->name(),
                'organization' => fake()->company(),
                'category_id' => $categories->random()->id,
                'status' => 'awarded',
                'final_score' => rand(90, 99),
                'final_grade' => 'A',
                'badge_id' => $goldBadge->id,
                'badge_name' => 'Gold',
                'email' => fake()->email(),
                'nominee_type' => 'individual',
            ]);
        }

        // Create 5 Silver Winners
        for ($i = 0; $i < 5; $i++) {
            Nomination::create([
                'season_id' => $pastSeason->id,
                'application_id' => 'AUR-2024-S' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'full_name' => fake()->name(),
                'organization' => fake()->company(),
                'category_id' => $categories->random()->id,
                'status' => 'awarded',
                'final_score' => rand(80, 89),
                'final_grade' => 'B',
                'badge_id' => $silverBadge->id,
                'badge_name' => 'Silver',
                'email' => fake()->email(),
                'nominee_type' => 'company',
            ]);
        }

        $this->command->info('Past Winners Seeder executed successfully.');
    }
}

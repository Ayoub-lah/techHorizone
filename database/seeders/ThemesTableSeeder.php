<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
use App\Models\User;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users with role = 1 (responsible users)
        $responsibleUsers = User::where('role', 1)->get();

        // Check if there are any responsible users
        if ($responsibleUsers->isEmpty()) {
            $this->command->info('No responsible users found! Please seed users first.');
            return;
        }

        // Predefined themes
        $themes = [
            ['name' => 'Programmation', 'description' => 'Thème sur la programmation'],
            ['name' => 'Science des données', 'description' => 'Thème sur la science des données'],
            ['name' => 'Technologie', 'description' => 'Thème sur la technologie'],
            ['name' => 'Développement personnel', 'description' => 'Thème sur le développement personnel'],
            ['name' => 'Écriture', 'description' => 'Thème sur l\'écriture'],
            ['name' => 'Relations', 'description' => 'Thème sur les relations'],
        ];

        // Assign themes to responsible users
        foreach ($themes as $themeData) {
            // Get a random responsible user
            $user = $responsibleUsers->random();

            // Create the theme
            Theme::create([
                'name' => $themeData['name'],
                'description' => $themeData['description'],
                'user_id' => $user->id, // Assign the responsible user
            ]);
        }

        $this->command->info('Themes seeded successfully!');
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Survey;
use App\Models\Visitor;
use App\Models\Feedback;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Response;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();

        $this->call(SurveySeeder::class);

        $visitors = Visitor::factory()->count(100)->create();

        $surveys = Survey::all();

         // Membuat response untuk setiap kombinasi visitor_id dan survey_id
         foreach ($visitors as $visitor) {
            foreach ($surveys as $survey) {
                Response::create([
                    'visitor_id' => $visitor->id,
                    'survey_id' => $survey->id,
                    'answer' => rand(3, 4), // atau gunakan $this->faker->randomElement(['1', '2', '3', '4'])
                ]);
            }
        }

        // Membuat 20 feedback
        Feedback::factory()
            ->count(20)
            ->create();
    }
}

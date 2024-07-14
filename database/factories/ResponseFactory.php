<?php

namespace Database\Factories;

use App\Models\Survey;
use App\Models\Visitor;
use App\Models\Response;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Response::class;
    public function definition()
    {
        return [
            'visitor_id' => Visitor::factory(),
            'survey_id' => Survey::inRandomOrder()->first()->id,
            'answer' => $this->faker->randomElement(['1', '2', '3', '4']),
        ];
    }
}

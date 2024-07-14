<?php

namespace Database\Factories;

use App\Models\Visitor;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Feedback::class;
    public function definition()
    {
        return [
            'visitor_id' => Visitor::factory(),
            'comment' => $this->faker->paragraph,
        ];
    }
}

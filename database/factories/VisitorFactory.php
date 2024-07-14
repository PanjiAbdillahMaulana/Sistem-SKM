<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Visitor::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 65),
            'gender' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'education' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),
            'occupation' => $this->faker->jobTitle,
            // 'service_received' => $this->faker->sentence,
        ];
    }
}

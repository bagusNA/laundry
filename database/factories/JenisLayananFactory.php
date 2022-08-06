<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisLayanan>
 */
class JenisLayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_jenis' => fake()->word(),
            'satuan' => fake()->randomElement(['kg', 'seprai', 'ambal'])
        ];
    }
}

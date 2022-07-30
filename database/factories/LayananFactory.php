<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->words(2, true),
            'estimasi_waktu' => fake()->randomNumber(2),
            'harga' => fake()->randomNumber(4),
            'satuan' => 'kg'
        ];
    }
}

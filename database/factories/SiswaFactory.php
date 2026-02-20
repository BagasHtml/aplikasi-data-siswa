<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'umur' => $this->faker->numberBetween(),
            'alamat' => $this->faker->address(),
            'kelas' => fake()->randomElement(['RPL 1', 'RPL 2', 'RPL 3', 'RPL 4', 'RPL 5']),
        ];
    }
}

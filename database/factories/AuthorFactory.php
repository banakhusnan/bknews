<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement([1,2,3]),
            'tgl_lahir' => $this->faker->date(),
            'tempat_lahir' => $this->faker->randomElement(['Semarang', 'Yogyakarta']),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'alamat' => $this->faker->address(),
        ];
    }
}

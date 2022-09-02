<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_id' =>  $this->faker->randomElement([1,2,3]),
            'subkategori_id' =>  mt_rand(1,11),
            'judul' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'deskripsi' => $this->faker->paragraphs(mt_rand(5,10), true),
        ];
    }
}

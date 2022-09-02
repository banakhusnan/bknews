<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Berita;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->state([
            'role' => 'author'
        ])->create();

        $category = [
            'olah-raga' => 'Olah Raga',
            'ekonomi' => 'Ekonomi',
            'teknologi' => 'Teknologi',
        ];

        Author::factory(3)->create();

        foreach ($category as $key => $ctg) {
            Kategori::create([
                'slug' => $key,
                'nama' => $ctg
            ]);
        }

        $subcategory = [
            [
                'sepak-bola' => 'Sepak Bola',
                'moto-gp' => 'Moto GP',
                'f1' => 'F1',
                'badminton' => 'Badminton',
            ],
            [
                'keuangan' => 'Keuangan',
                'energi' => 'Energi',
                'bisnis' => 'Makro',
            ],
            [
                'teknologi-informasi' => 'Teknologi Informasi',
                'sains' => 'Sains',
                'telekomunikasi' => 'Telekomunikasi',
                'otomotif' => 'Otomotif',
            ],
        ];

        foreach($subcategory as $category_id => $value){
            foreach($value as $slug => $val){
                Subkategori::create([
                    'kategori_id' => $category_id + 1,
                    'slug' => $slug,
                    'nama' => $val,
                ]);
            }
        }

        Berita::factory(20)->create();
    }
}

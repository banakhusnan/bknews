<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        $category = [
            'perkuliahan' => 'Perkuliahan',
            'fasilitas' => 'Fasilitas',
            'kemahasiswaan' => 'Kemahasiswaan',
            'layanan' => 'Layanan',
            'administrasi' => 'Administrasi',
        ];

        foreach ($category as $key => $ctg) {
            Category::create([
                'slug' => $key,
                'name' => $ctg
            ]);
        }

        $subcategory = [
            [
                'kurikulum' => 'Kurikulum',
                'beban-studi' => 'Beban Studi atau SKS',
                'dekan' => 'Dekan',
                'dosen' => 'Dosen',
                'wisuda' => 'Wisuda',
            ],
            [
                'sarana-olah-raga' => "Sarana Olah Raga",
                'sarana-ibadah' => "Sarana Ibadah",
                'perpustakaan' => "Perpustakaan",
                'auditorium' => "Auditorium",
            ],
            [
                'unit-kegiatan-mahasiswa' => 'UKM',
                'badan-eksekutif-mahasiswa' => 'BEM',
                'kampus-mengajar' => 'Kampus Mengajar',
                'pertukaran-mahasiswa' => 'Pertukaran Mahasiswa',
                'program-kreativitas-mahasiswa' => 'PKM',
            ],
            [
                'praktikum' => 'Praktikum',
                'penyajian-materi' => 'Penyajian Materi',
                'pembimbingan' => 'Pembimbingan',
            ],
            [
                'beasiswa' => 'Beasiswa',
                'kurikulum' => 'Kurikulum',
                'uang-kuliah-tunggal' => 'Uang Kuliah Tunggal (UKT)'
            ],
        ];

        foreach($subcategory as $category_id => $value){
            foreach($value as $slug => $val){
                Subcategory::create([
                    'category_id' => $category_id + 1,
                    'slug' => $slug,
                    'name' => $val,
                ]);
            }
        }

        News::factory(20)->create();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\Berita;

class CategoryController extends Controller
{
    public function index(Kategori $slugKategori)
    {
        $title = '';
        $subcategoryName = null;
        if(request()->is('news/'.$slugKategori->slug)){
            $title = $slugKategori->nama;
            if (request('subcategory')) {
                $subcategoryName = Subkategori::select('nama')->firstWhere('slug', request('subcategory'));
            }
        }

        return view('category.index', [
            'title' => [$title, $subcategoryName],
            'nav' => Subkategori::where('kategori_id', $slugKategori->id_kategori)->get(),
            'category' => Berita::filter([
                    'category' => $slugKategori->slug, 
                    'subcategory' => request('subcategory'),
                    'search' => request('search'),
                    ])->get()
            ]);
    }
}

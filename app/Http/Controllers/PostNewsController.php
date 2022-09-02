<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class PostNewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            "data" => Berita::filter(['search' => request('search')])->latest('updated_at')->paginate(10)->withQueryString()
        ]);
    }

    public function detailNews(Berita $slug)
    {
        return view('news.detail', [
            "news" => $slug,
            "otherNews" => Berita::all()
        ]);
    }

    public function about()
    {
        return view('about.index');
    }

    public function search()
    {
        dd(redirect(url()->current()));
        return view('about.index');
    }
}

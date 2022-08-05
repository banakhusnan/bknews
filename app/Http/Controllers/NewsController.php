<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            "data" => News::latest()->paginate(10)->withQueryString()
        ]);
    }

    public function detailNews(News $slug)
    {
        return view('news.detail', [
            "news" => $slug,
            "otherNews" => News::all()
        ]);
    }

    public function about()
    {
        return view('about.index');
    }
}

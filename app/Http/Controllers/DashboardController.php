<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    
    public function users()
    {
        $user = User::all();
        return view('dashboard.users',[
            'users' => $user
        ]);
    }

    public function news()
    {
        $news = News::all();
        // dd($news);
        return view('dashboard.news',[
            'news' => $news
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $news = News::all();
            return view('dashboard.index', [
                'infoNews' => $news
            ]);
        } else if(auth()->user()->role == 'author'){
            $news = News::where('user_id', auth()->user()->id)->get();
            return view('dashboard.index',[
                'infoNews' => $news
            ]);
        }
    }

    public function profile(){
        $profile = User::where('id', auth()->user()->id)->first();
        $news = News::where('user_id', auth()->user()->id)->get();
        return view('dashboard.profile.index', [
            'user' => $profile,
            'news' => $news
        ]);
    }
}

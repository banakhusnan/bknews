<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Subcategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $news = News::latest('updated_at')->get();
            return view('dashboard.news.index',[
                'news' => $news,
                'subcategory' => Subcategory::all()
            ]);
        } elseif (auth()->user()->role == 'author') {
            $news = News::latest('updated_at')->where('user_id',auth()->user()->id)->get();
            return view('dashboard.news.index',[
                'news' => $news,
                'subcategory' => Subcategory::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            "subcategory_id" => "required",
            "image" => "image|file|max:2048",
            "description" => "required",
        ]);
        
        if($validatedData->fails()){
            return response()->json($validatedData->errors());
        }

        if($request->file('image')){
            $image = $request->file('image')->store('file-images', ['disk' => 'my_files']);
        } else {
            $image = null;
        }
        $news = News::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            'subcategory_id' => $request->subcategory_id,
            'image' => $image,
            'description' => $request->description
        ]);

        if($news){
            return redirect()->route('news.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('slug', $id)->first();
        return view('dashboard.news.detail',[
            'news' => $news,
            'subcategory' => Subcategory::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::where('slug', $id)->first();
        $validatedData = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            "subcategory_id" => "required",
            "image" => "image|file|max:2048",
            "description" => "required",
        ]);

        if($validatedData->fails()){
            foreach ($validatedData->errors() as $error) {
                return redirect()->back()->with('danger', $error);
            } 
        }

        if($request->file('image')){
            $image = $request->file('image')->store('file-images', ['disk' => 'my_files']);
        } else {
            $image = $news->image;
        }

        $news->update([
            'title' => $request->title,
            'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            'subcategory_id' => $request->subcategory_id,
            'image' => $image,
            'description' => $request->description
        ]);

        if($news){
            return redirect()->route('news.show', $news->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('slug', $id)->delete();
        return redirect()->route('news.index')->with('success', 'Berita Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;

class CategoryController extends Controller
{
    public function index(Category $slugCategory)
    {
        $title = '';
        $subcategoryName = null;
        if(request()->is('news/'.$slugCategory->slug)){
            $title = $slugCategory->name;
            if (request('subcategory')) {
                $subcategoryName = Subcategory::select('name')->firstWhere('slug', request('subcategory'));
            }
        }

        return view('category.index', [
            'title' => [$title, $subcategoryName],
            'nav' => Subcategory::where('category_id', $slugCategory->id)->get(),
            'category' => News::filter([
                'category' => $slugCategory->slug, 
                'subcategory' => request('subcategory'),
                ])->get()
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\News;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategory';
    protected $guarded = ['id'];
    protected $with = ['category'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function news(){
        return $this->hasMany(News::class);
    }
}

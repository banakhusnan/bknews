<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $guarded = ['id'];

    public function news(){
        return $this->hasMany(News::class);
    }
    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }
}

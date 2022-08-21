<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'news';
    protected $guarded = ['id'];
    protected $with = ['subcategory', 'user'];

    // Filtering
    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['category'] ?? false, function($query, $category){
            return $query->whereHas('subcategory', function($query) use($category){
                $query->whereHas('category', function($query) use($category){
                    $query->where('slug',  $category);
                });
            });
        });
        $query->when($filter['subcategory'] ?? false, function($query, $subcategory){
            return $query->whereHas('subcategory', function($query) use($subcategory){
                $query->where('slug', $subcategory);
            });
        });
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

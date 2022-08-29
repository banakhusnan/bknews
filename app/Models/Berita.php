<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Subkategori;

class Berita extends Model
{
    use HasFactory;

    protected $guarded = ['id_berita'];
    protected $table = 'berita';
    protected $with = ['subkategori', 'author'];

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
    
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id_author');
    }

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'subkategori_id', 'id_subkategori');
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

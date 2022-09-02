<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
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
            return $query->whereHas('subkategori', function($query) use($category){
                $query->whereHas('kategori', function($query) use($category){
                    $query->where('slug',  $category);
                });
            });
        });
        
        $query->when($filter['subcategory'] ?? false, function($query, $subcategory){
            return $query->whereHas('subkategori', function($query) use($subcategory){
                $query->where('slug', $subcategory);
            });
        });

        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('judul', 'like', '%'.$search . '%');
        });
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F, Y');
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

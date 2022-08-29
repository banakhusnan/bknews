<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Berita;
use App\Models\Kategori;

class Subkategori extends Model
{
    use HasFactory;
    
    protected $guarded = ['id_subkategori'];
    protected $table = 'subkategori';
    protected $with = ['kategori'];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}

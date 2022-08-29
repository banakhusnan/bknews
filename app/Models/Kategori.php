<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subkategori;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id_kategori'];
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    public function subkategori()
    {
        return $this->hasMany(Subkategori::class);
    }
}

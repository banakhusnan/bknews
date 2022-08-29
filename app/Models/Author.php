<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Berita;
use App\Models\User;

class Author extends Model
{
    use HasFactory;

    protected $guarded = ['id_author'];
    protected $table = 'author';
    protected $primaryKey = 'id_author';
    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function berita(){
        return $this->hasMany(Berita::class);
    }
}

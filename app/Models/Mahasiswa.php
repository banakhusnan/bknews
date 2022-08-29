<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aspirasi;
use App\Models\User;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id_mahasiswa'];
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class);
    }
}

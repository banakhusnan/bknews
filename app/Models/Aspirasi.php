<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Tanggapan;

class Aspirasi extends Model
{
    use HasFactory;

    protected $guarded = ['id_aspirasi'];
    protected $table = 'aspirasi';
    protected $primaryKey = 'id_aspirasi';
    protected $with = ['mahasiswa'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function tanggapan()
    {
        return $this->hasOne(Aspirasi::class);
    }
}

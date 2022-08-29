<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aspirasi;

class Tanggapan extends Model
{
    use HasFactory;

    protected $guarded = ['id_tanggapan'];
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $with = ['aspirasi'];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'aspirasi_id', 'id_aspirasi');
    }
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempat_makan extends Model
{
    use HasFactory;
    protected $table = 'tempat_makan';
    public $timestamps = false;

    protected $fillable = [
        'nama_tempat',
        'kategori_id',
        'alamat',
        'jam_operasional',
        'geom'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class,'kategori_id');
    }
};

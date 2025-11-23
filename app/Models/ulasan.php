<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    public $timestamps = false;
    protected $fillable = [
        'tempat_id',
        'sumber',
        'penulis',
        'ulasan',
        'rating',
        'tanggal',
    ];
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kampus extends Model
{
    use HasFactory;
    protected $table = 'kampus';
    public $timestamps = false;
    protected $fillable = [
        'alamat',
        'geom'
    ];
}

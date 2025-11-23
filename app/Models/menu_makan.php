<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_makan extends Model
{
    use HasFactory;
    protected $table = 'menu_makan';
    public $timestamps = false;
    protected $fillable = [
        'tempat_id',
        'nama_menu',
        'harga',
        'kalori'

    ];

    public function tempat_makan(){
        return $this->belongsTo(tempat_makan::class,'tempat_id');
    }

}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_favorites extends Model
{
    use HasFactory;
    protected $table = 'user_favorites';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'tempat_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function tempat_makan(){
        return $this->belongsTo(tempat_makan::class,'tempat_id');
    }
}

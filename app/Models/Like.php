<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'postcard_id',
        'user_id',
        'like' 
    ];

    //Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship to Postcard
    public function postcard(){
        return $this->belongsTo(Postcard::class);
    }
}

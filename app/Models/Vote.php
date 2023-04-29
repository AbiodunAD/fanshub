<?php

namespace App\Models;

use App\Models\User;
use App\Models\Postcard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'postcard_id',
        'user_id',
        'vote',
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

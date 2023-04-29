<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id',
        'postcard_id',
        'body'
    ];


    //Relationship with Postcards
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship with Postcards
    public function postcard(){
        return $this->belongsTo(Postcard::class);
    }

    public function getTimeAgo($carbonObject) {
        return str_ireplace(
            [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'], 
            ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'], 
            $carbonObject->diffForHumans()
        );
    }
}

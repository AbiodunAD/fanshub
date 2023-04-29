<?php

namespace App\Models;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Postcard extends Model
{
    
    protected $fillable = [
        'post',
        'postimage',
        'postvideo',
        'user_id' 
    ];

    //Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship to comment
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //Relationship to Like
    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    } 
 
    public function userVotes()
    {
        return $this->votes()->one()->where('user_id', auth()->id());
    } 

    public function getTimeAgo($carbonObject) {
        return str_ireplace(
            [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'], 
            ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'], 
            $carbonObject->diffForHumans()
        );
    }

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('post', 'like', '%' . request('search') . '%');
        }
    }
    
}

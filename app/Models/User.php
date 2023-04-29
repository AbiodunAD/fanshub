<?php

namespace App\Models;


// use Overtrue\LaravelLike\Traits\Liker;
// use Overtrue\LaravelFollow\Traits\CanLike;
use App\Postcard;
use App\Models\Vote;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ProtoneMedia\LaravelVerifyNewEmail\MustVerifyNewEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, MustVerifyNewEmail;
    // use CanLike, Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'bio',
        'profession',
        'profilephoto',
        'profilebanner',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make( $value ),
        );
    }

    //Relationship with Postcards
    public function postcards(){
        return $this->hasMany(Postcard::class, 'user_id');
    }

    //Relationship with Comments
    public function comment(){
        return $this->hasMany(Comment::class, 'user_id');
    }

    //Relationship with likes
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //Relationship with votes
    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('first_name', 'like', '%' . request('search') . '%')
            ->orWhere('last_name', 'like', '%' . request('search') . '%');
        }
    }

    

}

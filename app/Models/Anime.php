<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'author',
        'image'
    ];

    //Many To One relation with Comment class
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    //Many to Many relation with Tag class
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Add item to User's favorites animes
    public function favorite_to_user()
    {
        return $this->belongsToMany(User::class, 'anime_favorite');
    }
    
    //Add item to user's watched animes
    public function watched_by_user()
    {
        return $this->belongsToMany(User::class, 'anime_watched');
    }
}

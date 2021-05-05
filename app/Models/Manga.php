<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'author',
        'image'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Add item to User's favorites mangas
    public function favorite_to_user()
    {
        return $this->belongsToMany(User::class);
    }
    
    //Add item to user's read mangas
    public function readed_to_user()
    {
        return $this->belongsToMany(User::class, 'manga_user_readed');
    }
}

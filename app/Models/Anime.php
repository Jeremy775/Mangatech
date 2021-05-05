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
}

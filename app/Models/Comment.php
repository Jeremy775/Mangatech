<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'comment'
    ];

    //Many To One relation
    public function animes()
    {
        return $this->belongsTo(Anime::class);
    }

    //Many To One relation
    public function mangas()
    {
        return $this->belongsTo(Manga::class);
    }

    //Many To One relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }
}

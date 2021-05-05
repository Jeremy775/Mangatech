<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaUserPlanning extends Manga
{
    use HasFactory;
    protected $table = 'manga_user_planning';

    //Add item to user's planned mangas
    public function planning_to_user()
    {
        return $this->belongsToMany(User::class, 'manga_user_planning');
    }
}

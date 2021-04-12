<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}

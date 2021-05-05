<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = false;


    public function anime()
    {
        return $this->belongsToMany(Anime::class);
    }

    public function manga()
    {
        return $this->belongsToMany(Manga::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

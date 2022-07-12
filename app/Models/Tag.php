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


    public function cour()
    {
        return $this->belongsToMany(Cour::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

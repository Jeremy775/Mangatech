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
    public function cours()
    {
        return $this->belongsTo(Cour::class);
    }

    //Many To One relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

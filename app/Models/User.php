<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Set the password to be crypted
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function commentReplies()
    {
        return $this->hasMany(CommentReply::class);
    }

    //-----------------------User Manga list----------------------------//
    public function favorite_manga()
    {
        return $this->belongsToMany(Manga::class, 'manga_user');
    }

    public function planning_manga()
    {
        return $this->belongsToMany(Manga::class, 'manga_user_planning');
    }

    public function readed_manga()
    {
        return $this->belongsToMany(Manga::class, 'manga_user_readed');
    }

    //-----------------------User Anime list----------------------------//
    public function favorite_anime()
    {
        return $this->belongsToMany(Anime::class, 'anime_favorite');
    }

    public function planning_anime()
    {
        return $this->belongsToMany(Anime::class, 'anime_planning');
    }

    public function watched_anime()
    {
        return $this->belongsToMany(Anime::class, 'anime_watched');
    }

    //-----------------------Forum----------------------------//
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}

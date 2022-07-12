<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'channel_id',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Filtre les discussions par channels
    public function scopeFilterByChannels($builder)
    {
        //Si la requete est faite
        if (request()->query('channel')) {
            //on cherche la channel spécifique que l'on veut filtrer 
            $channel = Channel::where('slug', request()->query('channel'))->first();
            //Si la channel existe 
            if ($channel) {
                // on filtre le builder dont l'id correspond a celui de la database
                return $builder->where('channel_id', $channel->id);
            }
            return $builder;
        }
        return $builder;
    }
}

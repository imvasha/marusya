<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','category_id','name','comment','description','url','votes','votes_up','votes_down','forup','confirmed'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function fotos()
    {
        return $this->hasMany('App\Foto');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['comment_id','post_id','user_id','your_name','comment','description','votes_up','votes_down','confirmed'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}

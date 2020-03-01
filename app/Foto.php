<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['url','name','post_id','votes','confirmed'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}

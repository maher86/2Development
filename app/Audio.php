<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $fillable = ['title','body','audio','status'];
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function gusetComments()
    {
        return $this->morphMany('App\GusetComment', 'commentable');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }
}

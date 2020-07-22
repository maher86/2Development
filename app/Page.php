<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = ['title','body','image','status'];

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

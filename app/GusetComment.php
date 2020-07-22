<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GusetComment extends Model
{
    protected $fillable = [
        'body', 
    ];
    public function commentable()
    {
        return $this->morphTo();
    }
}

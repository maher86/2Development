<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    //{
    protected $fillable = ['name','display_name'];

    // public function user(){
    //     return $this->belongToMany('App\User');
    // }

    // public function permission(){
    //     return $this->belongToMany('App\Permission');
    // }
}

<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    //
    protected $fillable = ['name','display_name'];

    // public function user(){
    //     return $this->belongToMany('App\User');
    // }

    // public function role(){
    //     return $this->belongToMany('App\Role');
    // }
}

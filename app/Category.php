<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vido;
use App\Page;
use App\Audio;
class Category extends Model
{
   


    public function page(){

        return $this->hasMany("App\Page");

    }

    public function video(){

        return $this->hasMany("App\Video");

    }

    public function audio(){

        return $this->hasMany("App\Audio");
    }
}

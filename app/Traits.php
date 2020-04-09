<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traits extends Model
{
    public $table = 'traits';

    public function pets(){
        return $this->belongsToMany(Pet::class);
    }
}

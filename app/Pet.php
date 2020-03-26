<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public $table = 'pets';

    protected $fillable = [
        'name', 'breed','gender','image','birthdate','description','created_at',
    ];
}

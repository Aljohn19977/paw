<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public $table = 'pets';

    protected $fillable = [
        'name', 'breed','gender','image','birthdate','description','created_at',
    ];

    public function posts(){
        return $this->belongsToMany(User::class);
    }

    public function addTraits(){
        return $this->belongsToMany(Traits::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function tags(){
        return $this->belongsToMany(Post::class);
    }

    public function traits(){
        return $this->belongsToMany(Traits::class)->withPivot('value');;
    }
}

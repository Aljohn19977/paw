<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    public $table = 'posts';

    protected $fillable = [
        'user_id', 'title','content','image','created_at',
    ];

    public function pets(){
        return $this->belongsToMany(Pet::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

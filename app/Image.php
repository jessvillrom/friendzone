<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    protected $table = 'images';

// Relacion de Uni a muchos 
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // Relacion de One a muchos
    public function likes(){
        return $this->hasMany(('App\Like')); 
    }

    // Relacion Muchos a uno 
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }


}

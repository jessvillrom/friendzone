<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    // Relacion Muchos a uno 
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion de Muchos a uno
    public function image(){
        return $this->belongsTo('App\User','image_id');
    }
}



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
  public function photos(){
    return $this->hasMany('App\Photo');
  }

  public function cascade(){
    return $this->belongsTo('App\Cascade');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  
}

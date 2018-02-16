<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cascade extends Model
{
  public function typefindevie(){
    return $this->hasOne('App\TypeFinDeVie');
  }

  public function typeglace(){
    return $this->hasOne('App\TypeGlace');
  }

  public function structure(){
    return $this->hasOne('App\Structure');
  }

  public function commentaires(){
    return $this->hasMany('App\Commentaire');
  }

  public function zones(){
    return $this->belongsToMany('App\Zone');
  }

  public function constituants(){
    return $this->belongsToMany('App\Constituant');
  }

  public function supports(){
    return $this->belongsToMany('App\Support');
  }
}

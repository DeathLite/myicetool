<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
  public function supports(){
    return $this->belongsToMany('App\Support');
  }
}

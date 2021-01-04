<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    public function phoropter(){
      return $this->hasOne(StoreLocation::class, 'phoropter_id');
    }

    public function lensometer(){
      return $this->hasOne(StoreLocation::class, 'lensometer_id');
    }

    public function refractor(){
      return $this->hasOne(StoreLocation::class, 'refractor_id');
    }
}

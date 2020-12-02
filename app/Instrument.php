<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    public function storeLocation(){
      return $this->hasMany(StoreLocation::class);
    }
}

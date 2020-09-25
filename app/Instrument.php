<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    public function storeInstrument(){
      return $this->hasMany(StoreInstrument::class);
    }
}

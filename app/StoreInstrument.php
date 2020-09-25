<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreInstrument extends Model
{
  public function storeLocation(){
    return $this->belongsTo(StoreLocation::class);
  }
  public function instrument(){
    return $this->belongsTo(Instrument::class);
  }
}

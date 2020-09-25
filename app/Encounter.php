<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    public function storeLocation(){
      return $this->belongsTo(StoreLocation::class);
    }
}

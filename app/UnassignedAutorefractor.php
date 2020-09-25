<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnassignedAutorefractor extends Model
{
    public function storeLocation(){
      return $this->belongsTo(StoreLocation::class);
    }
}

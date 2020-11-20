<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $fillable = ['screen_calibration'];
    public function storeInstrument(){
      return $this->hasMany(StoreInstrument::class);
    }
    public function encounter(){
      return $this->hasMany(Encounter::class);
    }
    public function unassignedAutorefractor(){
      return $this->hasMany(UnassignedAutorefractor::class);
    }
    public function unassignedLensometer(){
      return $this->hasMany(UnassignedLensometer::class);
    }
    public function user(){
      return $this->hasMany(User::class);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\StoreLocation;
use App\Instrument;

class Locations extends Component
{
    public $showModal = false;
    public $location;
    protected $rules = [
      'location.name' => 'required',
      'location.store_number' => 'required',
      'location.street' => 'nullable',
      'location.city' => 'nullable',
      'location.state' => 'nullable',
      'location.phoropter_id' => 'required',
      'location.lensometer_id' => 'required',
      'location.refractor_id' => 'required',
      'location.api_token' => 'min:3'
    ];

    public $phoropters;
    public $lensometers;
    public $autorefs;

    public function render()
    {
        $this->phoropters = Instrument::where('type', 'phor')->get();
        $this->lensometers = Instrument::where('type', 'al')->get();
        $this->autorefs = Instrument::where('type', 'ar')->get();
        return view('livewire.locations', ['stores' => StoreLocation::all()]);
    }

    public function deleteLocation($id){
      StoreLocation::find($id)->delete();
    }
    public function editLocation($id){
      $this->showModal = true;
      $this->location = StoreLocation::find($id);
    }

    public function save(){
      $this->location->save();
      $this->showModal = false;
    }

    public function close(){
      $this->showModal = false;
    }

    public function api_regen(){
      $this->location->api_token = uniqid();
      $this->location->save();
    }
}

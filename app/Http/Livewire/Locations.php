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
      'location.instrument_id' => 'required',
      'location.api_token' => 'min:3'
    ];

    public function render()
    {
        return view('livewire.locations', ['stores' => StoreLocation::all(), 'instruments' => Instrument::all()]);
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

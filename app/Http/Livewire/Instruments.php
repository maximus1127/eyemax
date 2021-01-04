<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Instrument;

class Instruments extends Component
{
    public $phoropters;
    public $lensometers;
    public $autorefs;
    public $instruments;
    public function render()
    {
        $this->instruments = Instrument::all();
        $this->phoropters = Instrument::where('type', 'phor')->get();
        $this->lensometers = Instrument::where('type', 'al')->get();
        $this->autorefs = Instrument::where('type', 'ar')->get();
        return view('livewire.instruments');
    }
}

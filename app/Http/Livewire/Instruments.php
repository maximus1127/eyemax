<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Instrument;

class Instruments extends Component
{
    public $instruments;
    public function render()
    {
        $this->instruments = Instrument::all();
        return view('livewire.instruments');
    }
}

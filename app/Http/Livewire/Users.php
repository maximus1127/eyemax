<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
use App\StoreLocation;

class Users extends Component
{
  public $showModal = false;
  public $user;
  protected $rules = [
    'user.name' => 'required',
    'user.email' => 'required',
    'user.store_location_id' => 'required',
    'user.role' => 'required'
  ];

  public function render()
  {
      return view('livewire.users', ['techs' => User::all(), 'stores' => StoreLocation::all()]);
  }

  public function deleteUser($id){
    User::find($id)->delete();
  }
  public function editUser($id){
    $this->showModal = true;
    $this->user = User::find($id);
  }

  public function save(){
    $this->user->save();
    $this->showModal = false;
  }

  public function close(){
    $this->showModal = false;
  }
}

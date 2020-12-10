<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Location</th>
      <th scope="col">Number</th>
      <th scope="col">Address</th>
      <th scope="col">Calibration</th>
      <th>Phoropter</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($stores as $e)
      <tr>
        <th scope="row">{{$e->name}}</th>
        <td>{{$e->store_number}}</td>
        <td>{{$e->street}}<br />{{$e->city.', '.$e->state}}</td>
        <td>{{$e->screen_calibration}}</td>
        <td>{{$e->instrument->name}}</td>
        <td><button wire:click="deleteLocation({{$e->id}})" class="btn-sm btn-danger">Delete</button><button wire:click="editLocation({{$e->id}})" class="btn-sm btn-info">Edit</button></td>
      </tr>
    @endforeach
  </tbody>


</table>


<div class="modal" @if($showModal) style="display:block"@endif>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="locationModalLabel">Add Location</h5>
        <button type="button" class="close" wire:click="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="save">
          <div class="form-group">
            <label for="locationName">Location Name</label>
            <input wire:model="location.name" type="text" class="form-control" id="locationName" >
          </div>
          <div class="form-group">
            <label for="locationNumber">Location Number</label>
            <input wire:model="location.store_number" type="text" class="form-control" id="locationNumber" >
          </div>
          <div class="form-group">
            <label for="street">Street Name and Number</label>
            <input wire:model="location.street" type="text" class="form-control" id="street" >
          </div>
          <div class="form-group">
            <label for="city">Location City</label>
            <input wire:model="location.city" type="text" class="form-control" id="city">
          </div>
          <div class="form-group">
            <label for="state">Location State</label>
            <input wire:model="location.state" type="text" class="form-control" id="state" >
          </div>
          <div class="form-group">
            <label for="state">Phoropter Model</label>
            <select  name="phor" id="phor" wire:model="location.instrument_id">
              @foreach($instruments as $in)
                <option value="{{$in->id}}" @if($location != null && $location->instrument_id == $in->id) selected @endif>{{$in->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="state">Api Key</label> <button class="btn-sm btn-warning" wire:click="api_regen">Regenerate</button>
            <input wire:model="location.api_token" type="text" class="form-control" id="api" >
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
        <button type="button" class="btn btn-primary" wire:click="save">Save</button>
      </div>
    </div>
  </div>
</div>
</div>

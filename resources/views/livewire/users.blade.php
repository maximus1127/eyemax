<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Role</th>
      <th scope="col">Email</th>
      <th scope="col">Store</th>

      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($techs as $e)
      <tr>
        <th scope="row">{{$e->name}}</th>
        <td>{{$e->role}}</td>
        <td>{{$e->email}}</td>
        <td>{{$e->storeLocation->name}}</td>
        <td><button wire:click="deleteUser({{$e->id}})" class="btn-sm btn-danger">Delete</button><button wire:click="editUser({{$e->id}})" class="btn btn-info btn-sm">Edit</button></td>
      </tr>
    @endforeach
  </tbody>
</table>



<div class="modal" @if($showModal) style="display: block" @endif>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="save">
          <div class="form-group">
            <label for="userName">User Name</label>
            <input wire:model="user.name" type="text" class="form-control" id="userName" >
          </div>
          <div class="form-group">
            <label for="userEmail">User Email</label>
            <input wire:model="user.email" type="email" class="form-control" id="userEmail" >
          </div>
          <div class="form-group">
            <label for="store">Store Location</label>
            <select id="store" wire:model="user.store_location_id">
              @foreach($stores as $s)
                <option value="{{$s->id}}" @if($user != null && $user->store_location_id == $s->id) selected @endif>{{$s->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="store">User Role</label>
            <select id="userRole" wire:model="user.role">

                <option value="onsite-tech" @if($user != null && $user->role == "onsite-tech") selected @endif>Onsite Tech</option>
                <option value="remote-tech" @if($user != null && $user->role == "remote-tech") selected @endif>Remote Tech</option>

            </select>
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

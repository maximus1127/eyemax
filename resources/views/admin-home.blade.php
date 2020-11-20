@extends('layouts.app')



@section('content')

<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locationModal">Add Location</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Add User</button>
  <h3>Locations</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Location</th>
        <th scope="col">Number</th>
        <th scope="col">Address</th>
        <th scope="col">Calibration</th>
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
      </tr>
@endforeach
    </tbody>


  </table>
<br /><br />
    <h3>Users</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Store</th>

        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($techs as $e)
      <tr>
        <th scope="row">{{$e->name}}</th>
        <td>{{$e->role}}</td>
        <td>{{$e->storeLocation->name}}</td>
        <td><a href="/delete-user/{{$e->id}}"><button class="btn-sm btn-danger">Delete</button></a></td>
      </tr>
@endforeach
    </tbody>
  </table>
</div>





<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="locationModalLabel">Add Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="locationName">Location Name</label>
            <input type="text" class="form-control" id="locationName" >
          </div>
          <div class="form-group">
            <label for="locationNumber">Location Number</label>
            <input type="text" class="form-control" id="locationNumber" >
          </div>
          <div class="form-group">
            <label for="street">Street Name and Number</label>
            <input type="text" class="form-control" id="street" >
          </div>
          <div class="form-group">
            <label for="city">Location City</label>
            <input type="text" class="form-control" id="city">
          </div>
          <div class="form-group">
            <label for="state">Location State</label>
            <input type="text" class="form-control" id="state" >
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveLocation()">Save</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="userName">User Name</label>
            <input type="text" class="form-control" id="userName" >
          </div>
          <div class="form-group">
            <label for="userEmail">User Email</label>
            <input type="email" class="form-control" id="userEmail" >
          </div>
          <div class="form-group">
            <label for="store">Store</label>
            <input type="text" class="form-control" id="store" >
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveUser()">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer-scripts')
<script>
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
  function saveLocation(){
    $.ajax({
      url: '/add-location',
      type: 'post',
      data: {
        name: $("#locationName").val(),
        number: $('#locationNumber').val(),
        street: $('#street').val(),
        city: $('#city').val(),
        state: $("#state").val()
      },
      success: data => location.reload(),
      error: data => alert('Could not save')
    })
  }

  function saveUser(){
    $.ajax({
      url: '/add-user',
      type: 'post',
      data: {
        name: $("#userName").val(),
        email: $('#userEmail').val(),
        store: $('#store').val(),
        password: $('#password').val(),
      },
      success: data => location.reload(),
      error: data => alert('Could not save')
    })
  }




</script>
@endsection

@extends('layouts.app')



@section('content')

<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locationModal">Add Location</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Add User</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#instrumentModal">Add Instrument</button>


  <h3>Locations</h3>
  @livewire('locations')
<br /><br />
    <h3>Users</h3>
  @livewire('users')
  <br /><br />
      <h3>Instruments</h3>
  @livewire('instruments')
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
          <div class="form-group">
            <label for="phor">Phoropter Model</label>
            <select  name="phor" id="phor">
              @foreach($phoropters as $in)
                <option value="{{$in->id}}">{{$in->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="al">Lensometer Model</label>
            <select  name="al" id="al">
              @foreach($lensometers as $in)
                <option value="{{$in->id}}">{{$in->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="refs">AutoRef Model</label>
            <select  name="refs" id="refs">
              @foreach($autorefs as $in)
                <option value="{{$in->id}}">{{$in->name}}</option>
              @endforeach
            </select>
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
            <label for="store">Store Location</label>
            <select id="store">
              @foreach($stores as $s)
                <option value="{{$s->id}}">{{$s->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="store">User Role</label>
            <select id="userRole">

                <option value="onsite-tech">Onsite Tech</option>
                <option value="remote-tech">Remote Tech</option>

            </select>
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

<div class="modal fade" id="instrumentModal" tabindex="-1" role="dialog" aria-labelledby="instrumentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="instrumentModalLabel">Add Instrument</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="modelName">Model Name</label>
            <input type="text" class="form-control" id="modelName" >
          </div>
          <div class="form-group">
            <label for="meta_name">Serial Name</label>
            <input type="email" class="form-control" id="meta_name" >
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <select id="modelType">
              <option value="phor">Phoropter</option>
              <option value="al">Lensometer</option>
              <option value="ar">AutoRef</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveInstrument()">Save</button>
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
        state: $("#state").val(),
        phor: $("#phor").val()
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
        position: $('userRole').val()
      },
      success: data => location.reload(),
      error: data => alert('Could not save')
    })
  }
    function saveInstrument(){
      $.ajax({
        url: '/add-instrument',
        type: 'post',
        data: {
          name: $("#modelName").val(),
          meta_name: $('#meta_name').val()
        },
        success: data => location.reload(),
        error: data => alert('Could not save')
      })
    }




</script>
@endsection

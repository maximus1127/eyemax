@extends('layouts.app')



@section('content')

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Location</th>
        <th scope="col">Pt Name</th>
        <th scope="col">Pt Number</th>
        <th scope="col">Created At</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tableBody">
      @foreach($ens as $e)
      <tr>
        <th scope="row">{{$e->storeLocation->name}}</th>
        <td>{{$e->pt_name}}</td>
        <td><a href="{{route('truvision', $e->id)}}">{{$e->pt_id}}</a></td>
        <td>{{Carbon\Carbon::parse($e->created_at)->format('m/d g:i A')}}</td>
      </tr>
@endforeach
    </tbody>
  </table>
</div>


@endsection


@section('footer-scripts')
  <script>
  Echo.channel('new-encounter').listen(
      "NewEncounter",
      function(data) {
        $("#tableBody").append(`<tr>
            <th scope="row">${data.location}</th>
            <td>${data.name}</td>
            <td><a href="/truvision/${data.id}">${data.number}</a></td>
            <td>${data.created}</td>
          </tr>`)
      }
  );

</script>
@endsection

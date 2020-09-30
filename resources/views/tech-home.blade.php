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
    <tbody>
      @foreach($ens as $e)
      <tr>
        <th scope="row">{{$e->store_location_id}}</th>
        <td><a href="{{route('truvision', $e->id)}}">{{$e->pt_name}}</a></td>
        <td>{{$e->pt_id}}</td>
        <td>{{Carbon\Carbon::parse($e->created_at)->format('m/d g:i A')}}</td>
      </tr>
@endforeach
    </tbody>
  </table>
</div>


@endsection

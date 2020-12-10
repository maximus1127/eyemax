<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Serial Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($instruments as $e)
      <tr>
        <th scope="row">{{$e->name}}</th>
        <td>{{$e->meta_name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>

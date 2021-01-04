<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Serial Name</th>
      <th scope="col">Type</th>

      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($instruments as $e)
      <tr>
        <td scope="row">{{$e->name}}</td>
        <td>{{$e->meta_name}}</td>
        <td>{{$e->type}}</td>
      </tr>
    @endforeach
  </tbody>
</table>

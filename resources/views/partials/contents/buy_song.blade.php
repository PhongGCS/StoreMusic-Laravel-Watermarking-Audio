<div class="container">
    <table class="table" style="background-color: #000000b5;">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>
        @foreach( $listsong as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ $item->name }}</td>
        <td>34.000 VNĐ</td>
        <td><a href="buy" class="btn btn-primary" >Buy</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>  
  </div>

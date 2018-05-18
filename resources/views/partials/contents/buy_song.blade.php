
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
        <td>{{ $item->Price }} VNĐ</td>
        <td><a href="{{  route('buysong_detail', $item->id ) }}" class="btn btn-primary" >Buy</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>  
 

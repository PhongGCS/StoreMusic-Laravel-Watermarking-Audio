<form action="{{route("PostSong")}}" method="post" enctype="multipart/form-data" >
{!! csrf_field() !!}
<div class="col-md-6">
<div class="form-group">
    <label for="SongName">Song Name</label>
    <input type="text" class="form-control" placeholder="Quan trọng phải là thần thái" name="name_song">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="Price">Price</label>
    <input type="text" class="form-control" placeholder="36000" name="price_song">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="SongFile">Song File</label>
    <input type="file" class="form-control-file" name="file_song">
  </div>
</div>
<div class="col-md-6">
<input type="submit" class=" btn btn-primary">
  </div>
</form>
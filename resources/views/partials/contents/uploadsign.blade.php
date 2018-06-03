
@if (! empty ($result))

<div class="container" style=" margin-top: 18%; text-align: center;">
<h2>{{ ($result[0]) ? "Your Signature is:" : "This song is not my sign" }}
</h2>
<h3>{{ $result }}</h3>


</div>


@else 
<form action="{{route("Revert")}}" method="post" enctype="multipart/form-data" >
{!! csrf_field() !!}
<div class="col-md-6">
  <div class="form-group">
    <label for="SongFile">Song File</label>
    <input type="file" class="form-control-file" name="file_song">
  </div>
  <input type="submit" class=" btn btn-primary">
</div>
</form>

@endif
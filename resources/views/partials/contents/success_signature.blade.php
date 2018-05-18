
<h2> {{ ($error)? 'Signature Success .Thanks you purchase.' :  'Sorry. You dont have enought monney.' }} 
</h2>
@if ($error) 
<a  class="btn btn-primary" href="{{ @asset('audios/'.$url_download)}}" download>Download</a>
@endif

<div class="main-content">
    <div class="list-song">
        <div class="content-audio">
            <div class="row row-image-song" style="background-image: url({{ @asset('images/onlyC-background.jpg') }}); background-size: cover;">
                <div class="col-md-2 image-song"><img src="{{ @asset('images/onlyC.jpg') }}" alt="" width="150px" height="150px"></div>
                <div class="col-md-10" ><h3 class="name_song"> {{  $first_song[0]->name }}</h3> </div>
            
            </div   
        </div>
        <audio id="audio" preload="auto" tabindex="0" controls="" controlsList="nodownload" type="audio/mpeg">
            <source type="audio/mp3" src="{{ @asset('audios/'.$first_song[0]->filename) }}">
        </audio>
        <ul id="playlist">
            @foreach ( $list_song as $item )
            <li {!! $loop->iteration == 1 ? 'class="active"' : '' !!}><a href="{{ @asset('audios/'.$item->filename) }}"> {{ $item->name }} </a></li>
           @endforeach
            
        </ul>
    </div>
</div>
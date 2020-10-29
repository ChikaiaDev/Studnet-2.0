@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <section class="align-items flex">
          
            <div class="card">
                {{-- <video width="100%" height="500" controls="">
                    <source src="https://drive.google.com/file/d/1oGzSmn3RzlMvU7yeJF1WHA_LUCfIYeUe/preview" type="video/mp4">
                        Your browser does not support the video tag
                </video> --}}
                <iframe src="https://drive.google.com/file/d/11mZoB2OWEtpKYCTJd0x-kxmeEy0aqzcX/preview" width="100%" height="480"></iframe>
                <div class="card-body">
                  <h3 class="card-title">{{$video->title}}</h3>
                  <p class="card-text" style="font-size: 17px">{{$video->description}}</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a class="btn btn-secondary" href = "https://drive.google.com/file/d/1oGzSmn3RzlMvU7yeJF1WHA_LUCfIYeUe/view">Click Here to go to the video</a>
                </div>
              </div>
              <hr>

              
              @foreach($series->videos as $video)
                <a href="/series/{{$series->id}}/episode/{{$video->episode_number}}" class="text-decoration-none" style="color: black">
                  <div class="card mb-12 mb-2" >
                    <div class="row no-gutters">
                      <div class="col-md-2">
                          <button class="series-counter">{{$video->episode_number}}</button>
                        {{-- <img src="images/video.jpg" class="card-img" alt="Video Image" > --}}
                      </div>
                      <div class="col-md-10">
                        <div class="card-body">
                          <h5 class="card-title">{{$video->title}}</h5>
                          <p class="card-text">{{substr($video->description,0,160)}}.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                    
                    @endforeach
          </section>
    </div>
</div>
@endsection

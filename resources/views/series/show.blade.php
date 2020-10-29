@extends('layouts.app')

@section('content')
<div class="jumbotron series-jumbotron">
    <div class="container">
        <h1 class="display-4">{{$series->title}}</h1>
        <p class="lead">{{$series->description}}</p>
        <hr class="my-4">
        
        <a class="btn btn-primary" href="/series/{{$series->id}}">Start series</a>
        <a class="btn btn-success" href="#">Subscribe</a>
    </div>
  </div>
  <div class="container">
    <section>
        <h2 class="text-center">Episodes</h2>
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
  

@endsection

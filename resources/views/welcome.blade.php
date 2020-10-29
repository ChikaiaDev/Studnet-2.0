@extends('layouts.app')

@section('content')
<div class="container">
    <section>
      <div class="jumbotron">
        <h1 class="display-4">Welcome to Studnet</h1>
        <p class="lead">A simple place to organize previously recorded classes for your students to view whenever they want!</p>
        <hr class="my-4">
        <a class="btn btn-primary" href="/series">View series</a>
        <a class="btn btn-success" href="#">Do Something Else</a>
      </div>
    </section>
    <section>
      <h2 class="text-center">Featured Post</h2>
      <div class="card-deck">
        @foreach ($featuredSeries as $series)
        <div class="card" href="{{route('series.show',$series)}}">
          <img src="images/video.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$series->title}}</h5>
            <p class="card-text">{{Str::words($series->description,15)}}</p>
            <div class="float">
              <p class="card-text float-left"><small class="text-muted">Last updated 3 mins ago</small></p>
              <a href="{{route('series.show',$series)}}" class="card-text float-right" ><small class="text-muted"> Go to Series   >></small></a>
            </div>
            
          </div>
        </div>
 
        @endforeach
        
        
      </div>
    </section>
    
</div>
@endsection
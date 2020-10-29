@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <section class="align-items-center " style="margin-left:5%; ">
            <h2 class="text-center">Featured Post</h2>
            <div class="flex-container">
              @foreach ($allSeries as $series)

              <div class="card float-left mb-3 mr-3 text-center series-list" >
                <img src="images/video.jpg" class="card-img-top" alt="..." style="object-fit: cover">
                <div class="card-body" style="height:10rem">
                  <h5 class="card-title">{{$series->title}}</h5>
                  <p class="card-text">{{substr($series->description,0,80)}}...</p>
                </div>
                <a href="{{route('series.show',$series)}}" class="btn btn-primary series-btn">Play</a>
              </div>
              
              @endforeach
            </div>
              
          </section>
    </div>
    <div class="row">
      {{$allSeries->links()}}
    </div>
    
</div>
@endsection

@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
      @can('create-series')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="pael-heading">{{ __('Dashboard') }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Series</h3>
                    @if(count($series)>0)
                      <table class="table">
                        <thead class="thead-light">
                          <tr>
                            
                            <th scope="col">Title</th>
                            <th scope="col ">Number of videos</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($series as $aseries)
                          <tr>
                            
                            <td>{{$aseries->title}}</td>
                            <td >{{count($aseries->videos)}}</td>
                            <td> 
                              <a href="{{route('series.show',$aseries)}}" class="btn btn-info float-left mr-1" style="color: white;">View</a>
                              <a href="" class="btn btn-success float-left">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @else
                      <h2>No series yet</h2>
                      <a class="btn btn-secondary" href="{{route('series.create')}}">Create New Series</a>
                      @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="panel profile-panel text-center">
            <div class="panel-heading " style="align-items: center;"><h3>My Actions</h3></div>
              <a href="{{route('series.create')}}" class="btn btn-info" style="color: white;">Create Series</a>
              <a href="{{route('Videos.create')}}" class="btn btn-success">Upload Video</a>
            <div class="panel-body">
              
            </div>
        </div>
        </div>
        @endcan
    </div>
</div>
@endsection

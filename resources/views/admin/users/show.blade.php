@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Series</h1>
  <p class="mb-4">Below is information about {{$user->name}}, to go back to other users <a  href="{{ route('admin.users.index') }}">click here </a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s Series</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
                    @if(count($series)>0)

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Number of videos</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Title</th>
                          <th>Number of videos</th>
                          <th>Actions</th>
                        
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($user->series as $aseries)
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
    </div>

@endsection

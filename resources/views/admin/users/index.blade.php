@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  @if (session('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
@endif
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    <p class="mb-4">Below is a list of users who are currently in the system .</p>
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">System Users</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">  
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            @can('edit-users')
                            <th>Actions</th>
                            @endcan
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                @can('edit-users')
                                <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-success float-left mr-2">Edit</a>
                                <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="float-left mr-2">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-secondary" type="submit">Delete</button>
                                </form>
                                <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-info float-left mr-2">View</a>
                                @endcan
                                </td>
                              </tr>
                                
                            @endforeach
                          
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  

@endsection

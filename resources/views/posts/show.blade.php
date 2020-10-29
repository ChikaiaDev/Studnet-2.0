@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 col-md-8">
            <a href="/posts" class="btn btn-primary white">Go back</a>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="float-right ml-1">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <h2>{{$post->title}}</h2>
                <p>{{$post->description}}</p>
                <p>{{$post->url}}</p>
            </div>
        </div>
    </div>
@endsection

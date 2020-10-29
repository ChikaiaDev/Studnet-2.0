@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Latest Videos</h2>
                @if(count($posts)>0)
                    @foreach($posts as $post)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></h5>
                            <small>Uploaded :{{$post->created_at}}</small>
                            <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="float-right ml-1">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-secondary" type="submit">Delete</button>
                            </form>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary float-right ml-1">Edit</a>
                           
                        </div>                        
                    </div>
                    @endforeach
                    {{$posts->links()}}
                @else
                <p>No video yet</p>
                    @endif

            </div>
        </div>
    </div>
@endsection

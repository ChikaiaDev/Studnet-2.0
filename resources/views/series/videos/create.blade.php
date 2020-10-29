@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('New Post') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Videos.store') }}">
                         
                            @csrf
                            <div class="form-group row">
                                <label for="series" class="col-md-4 col-form-label text-md-right">Select Series</label>
                                <div class="col-md-6">
                                    <select class="form-control col-md-8" id="series_id" name="series_id">
                                        @foreach($series as $aseries)
                                        <option value="{{$aseries->id}}">{{$aseries->title}}</option>
                                        @endforeach
                                      </select>

                                </div>
                                
                              </div>
                              <div class="form-group row">
                                <label for="episode_number" class="col-md-4 col-form-label text-md-right">Episode Number</label>
                                <div class="col-md-2">
                                    <select class="form-control col-md-8" id="episode_number" name="episode_number">                        
                                        <option value="1">1</option>
                                        <option value="2">2</option>   
                                        <option value="3">3</option>   
                                        <option value="4">4</option>                                           
                                        <option value="5">5</option>   
                                        <option value="6">6</option>   
                                        <option value="7">7</option>   
                                        <option value="8">8</option>   
                                        <option value="9">9</option>   
                                        <option value="10">10</option>   
                                        <option value="11">11</option>   
                                      </select>
                                </div>
                                
                              </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Video Title') }}</label>
                        
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required  autofocus>
                        
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        
                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required rows="5"></textarea>
                        
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="video_url" class="col-md-4 col-form-label text-md-right">{{ __('Video Url') }}</label>
                        
                                <div class="col-md-6">
                                    <input id="video_url" type="text" class="form-control @error('video_url') is-invalid @enderror" name="video_url" required >
                        
                                    @error('video_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






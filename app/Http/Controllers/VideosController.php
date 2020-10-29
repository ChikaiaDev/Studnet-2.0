<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\User;
use App\Video;

class VideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('series.videos.create')->with('series',$user->series);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'series_id'=> 'required',
            'episode_number'=> 'required',
            'title'=>'required',
            'description'=> 'required',
            'video_url'=> 'required'
          ]);

          $video = new  Video([
            'title'=>$request->title,
            'description'=>$request->description,
            'series_id'=>$request->series_id,
            'episode_number'=>$request->episode_number,
            'video_url'=>$request->video_url
          ]);
          $video->save();
          return redirect('/dashboard')->with('success', 'new video added to !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

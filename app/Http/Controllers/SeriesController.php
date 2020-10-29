<?php

namespace App\Http\Controllers;

use App\Series;
use App\Video;
use App\User;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allSeries = Series::orderBy('created_at','desc')->paginate(10);
        return view('series.index',compact('allSeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create');
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
            'title'=>'required',
            'description'=> 'required'
          ]);

          $series = new  Series([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>auth()->user()->id
          ]);
          $series->save();
          return redirect('/home')->with('success', 'new series created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
       
        return view('series.show',compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        //
    }
    public function episode(Series $series, $episodeNumber){
        $video= $series->videos()->where('episode_number',$episodeNumber)->first();
        return view ('series.videos.show', compact('series','episodeNumber','video'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=  Post::orderBy('created_at','desc')->paginate(50);
        return view ('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'description'=> 'required',
            'url' => 'required'
          ]);

          $post = new  Post([
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url
          ]);
          $post->save();


          return redirect('/posts')->with('success', 'new post added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('posts.edit')->with('post',$post);
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
            $post = Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;

            if($post->save()){
                $request->session()->flash('success','Your post has successfuly been updated!!');
            }else{
                $request->session()->flash('error','There seems to be a problem');
            }

            

            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        //dd($user);

        if($post->delete()){
            $request->session()->flash('success','Your post has successfuly been deleted!!');
        }else{
            $request->session()->flash('error','There seems to be a problem');
        }
        

        return redirect()->route('posts.index');
    }
    

}

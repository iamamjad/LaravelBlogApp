<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->filter(request(['tag','search']))->simplePaginate(4);
        return view('posts.index',['posts'=>$posts]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return  view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $formFields = $request->validate([
           'title'=>'required',
           'tags'=>'required',
           'description'=>'required',
       ]);
       if ($request->hasFile('logo'))
       {
           $formFields['logo'] =$request->file('logo')->store('logos','public');
       }
       $formFields['user_id'] = auth()->user()->id;
        Post::create($formFields);
       return redirect('/')->with('message','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        return view('posts.manage',['listings'=>auth()->user()->post()->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $find = Post::find($post);
         //Make sure logged in user is owner
        if($find->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title'=>'required',
            'tags'=>'required',
            'description'=>'required',
        ]);
        if ($request->hasFile('logo'))
        {
            $formFields['logo'] =$request->file('logo')->store('logos','public');
        }
        Post::where('id',$post)->update($formFields);
        return back()->with('message','Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $find = Post::find($post);
        ///Make sure logged in user is owner
        if($find->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized Action');
        }

        $post = Post::find($post);
        $post->delete();
        return redirect('/')->with('message','Post Delete successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comment = \App\Comment::All();

        return view('posts.show', compact('comment'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        //
        return View::make('posts.show')->with('post_id', $post_id);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            
            'post_id' => 'required',
            'user_id' => 'required|unique',
            'post_id' => 'required',
            'Comment' => 'required',
            'username' => 'required',
        ]);
      
        $Comment = $request->all();
        $Comments = Comments::create($Comment);


        return redirect()->route('posts.comment.show')
                        ->with('success', 'Posts updated successfully');
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
        $this->validate($request, [
            
            'post_id' => 'required',
            'user_id' => 'required|unique',
            'post_id' => 'required',
            'Comment' => 'required',
            'username' => 'required',
        ]);
      
        $Comment = $request->all();
        $Comments = Comments::update($Comment);


        return redirect()->route('posts.index')
                        ->with('success', 'Posts updated successfully');
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
                Comments::find($id)->delete();

    }
}

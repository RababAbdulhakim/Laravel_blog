<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Carbon;
use Illuminate\Support\Facades\Session;
use File;
use App\User;
use App\SubCategory;
use App\Posts_SubCategory;
use App\Comment;
use Auth;
use App\Category;
class PostsController extends Controller
{
    //
    public function index(Request $request)
    {
 $posts = Posts::orderBy('id','DESC')->paginate(3);       
        return view('posts.index',compact('posts')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           $users = User::All();
                $subcat = SubCategory::All();
                $posts = Posts::All();
        return view('posts.create',compact('posts' , 'users' , 'subcat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $Post = new \App\Posts;
                $subcat = new \App\Posts_SubCategory;
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'author'=>'required',
            'sub_cat_id'=> 'required',
            'post_id' => 'required'


        ]);
                 $sub = $request->all();
                 $subs = Posts_SubCategory::create($sub);

        $Post->id = $request->id;
        $Post->title = $request->title;
        $Post->description = $request->description;
        $Post->image = $request->image;
        $Post->author = $request->author;


        $file = Input::file('image');
        $title = $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $title);
        Posts::create([
            'image' => $title,
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'author' => Input::get('author'),
        ]);

        return redirect()->route('posts.index')
                        ->with('success', 'Posts created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

$posts = Posts::with('comments')->find($id);
//$posts = Posts::find($id)->comments;

//print_r($posts);exit;
return view('posts.show',compact('posts'));    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $posts = Posts::find($id);
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        Posts::find($id)->update($request->all());

        return redirect()->route('posts.index')
                        ->with('success', 'Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Posts::find($id)->delete();
        return redirect()->route('posts.index')
                        ->with('success', 'Posts deleted successfully');
    }
    function comment($id){
          $rules = array(
            'user_id' => 'required|unique',
            'posts_id' => 'required',
            'Comment' => 'required',
            'username' => 'required',
        );



         $posts = Posts::find($id);
   // print_r($posts);exit;
           
        $validator = Validator::make(Input::all(), $rules);
        $Comment = new Comment;
        $Comment->user_id = Auth::id();
        $Comment->posts_id = $posts->id;
        $Comment->Comment = Input::get('Comment');
        $Comment->username = Input::get('username');
        $Comment->save();


        return Redirect::to('/posts/' . $id)
                        ->with('success', 'Posts updated successfully');

    }
}

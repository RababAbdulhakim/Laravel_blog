<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Posts;
use App\Category;
use App\SubCategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
      // $posts = Posts::with('comments')->get();
       $search = \Request::get('title'); //<-- we use global request to get the param of URI

    $posts = Posts::where('title','like','%'.$search.'%')
        ->orderBy('created_at', 'desc')
        ->Paginate(3)
         ;

  //  $rr =$postss->setPath('/');
             //  $posts =trim($rr,"/?");

       $Categories = Category::with('SubCategories')->get();

     //var_dump($posts);exit;
        return view('home',compact('posts' , 'Categories')) ;       
       //return view('admin.dashboard.dashboard') ;

       
    }
    
    
    
}


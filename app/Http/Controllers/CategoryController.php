<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Http\Requests;
use DB;
use App\Posts;
class CategoryController extends Controller
{
    //
    
    //
    public function index(Request $request)
    {
         $posts = Posts::with('comments')->get();
       
       $Categories = Category::with('SubCategory')->paginate(5);
       //$Categories = Category::orderBy('id','DESC')->paginate(5);
        return view('Category.index',compact('Categories')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $Post = new \App\Category;
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',

        ]);
            Category::create($request->all());
        
        return redirect()->route('Category.index')
                        ->with('success','Posts created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = Category::find($id);
         $Subcategory = DB::table('SubCategory')
                    ->where('cat_id', $id)
                    ->get();
        return view('Category.show',compact('Category' , 'Subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::find($id);
        return view('Category.edit',compact('Category'));
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        Posts::find($id)->update($request->all());

        return redirect()->route('Category.index')
                        ->with('success','Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();
        return redirect()->route('Category.index')
                        ->with('success','Posts deleted successfully');
    }

}

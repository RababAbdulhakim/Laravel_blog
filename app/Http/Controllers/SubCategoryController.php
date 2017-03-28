<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use App\Http\Requests;

class SubCategoryController extends Controller
{
    //
    
    //
    public function index(Request $request)
    {
        $SubCategories = SubCategory::All();
     
         $Categories = Category::All();
        return view('SubCategory.index',compact('Categories' , 'SubCategories')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::All();
        return view('SubCategory.create',compact('Categories')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $SubCategory = new \App\SubCategory;
        $this->validate($request, [
            'title' => 'required',
            'cat_id' => 'required',

        ]);
            SubCategory::create($request->all());
        
        return redirect()->route('SubCategory.index')
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
        $SubCategory = SubCategory::find($id);
        return view('SubCategory.show',compact('SubCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SubCategory = SubCategory::find($id);
                $Categories= Category::All();
        return view('SubCategory.edit',compact('SubCategory','Categories'));
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
                        'cat_id' => 'required',

        ]);

        SubCategory::find($id)->update($request->all());

        return redirect()->route('SubCategory.index')
                        ->with('success','SubCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->route('SubCategory.index')
                        ->with('success','SubCategory deleted successfully');
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;
use App\Category;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs=Blog::all();
        return view('admin.blog.index')->with('blogs',$blogs);
        // return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags  = Tags::all()->pluck('name', 'id');
        $category  = Category::all()->pluck('name', 'id');

        return view('admin.blog.create')->with(compact('tags', 'category'));
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
        // dd( $request->all());
        $this->validate($request,[
            'name'=>'required|unique:blogs,name',
            'description'=>'required',
            'tags'=>'required',
            'category'=>'required'
        ]);

        $blogs = new Blog;
        $blogs->name=$request->input('name');
        $blogs->description=$request->input('description');
        $blogs->tags=implode($request->input('tags',[]));
        $blogs->category=$request->input('category');
        $blogs->save();



        // $blogs->name=$request->input('name');
        // $blogs->tags=$request->input('tags');
        // $blogs->category=$request->input('category');
        // $blogs->description=$request->input('description');

        // $blogs->save();
        // return redirect('admin/blog')->with('success','blogs added');

        // return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

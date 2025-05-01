<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image
        ]);
        return redirect()->route('posts.index')->with('success', 'Posts created successfully.');
    }

    public function show($id){
        $posts = Post::find($id);
        return view('admin.posts.show', compact('posts'));
    }

    public function edit($id){
        $posts = Post::find($id);
        return view('admin.posts.edit', compact('posts'));
    }

    public function update(Request $request,$id){

        $posts = Post::find($id);
        $posts->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Posts updated successfully.');
    }

    public function destroy($id){
        $posts = Post::FindOrFail($id);
        $posts->delete();
        return redirect()->route('posts.index')->with('success','Posts deleted successfully');
    }


}

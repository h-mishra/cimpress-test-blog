<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
		$blogs = Blog::with('user')->get();
        return view('blog.blog_list',compact('blogs'));
	}
	
	
	public function create(){
		return view('blog.create');
	}
	
	public function saveBlog(Request $request){
		$blogModel = new Blog();
        
		if($request->isMethod('post')){
			$data = $this->validate($request, [
				'title'=> 'required|min:10:max:100',
				'description'=>'required|min:100:max:500',
				
			]);
			$blogModel->storeBlog($data);
			return redirect('/blog/index')->with('success', 'Blog has been created succefully!');
		}else{
			redirect('/create/blog');			
		}
	}
	
	
	public function view($id)
    {
		$blog = Blog::where('id', $id)->with('user')->first();
		return view('blog.view', compact('blog', 'id'));
    }
	
	public function edit($id){
		
		$blog = Blog::where('id', $id)->first();
		
        return view('blog.edit', compact('blog', 'id'));
	}
	
	public function update(){
		$blog = new Blog();
        $data = $this->validate($request, [
            'description'=>'required|min:10:max:100',
            'title'=> 'required|min:100:max:500'
        ]);
        $data['id'] = $id;
        $blog->updateBlog($data);

        return redirect('/home')->with('success', 'Blog has been updated!');
	}
	
	
	public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/blog/index')->with('success', 'Blog has been deleted!');
    }
	
	public function publicIndex(){
		$blogs = Blog::with('user')->get();
        return view('blog.public_index',compact('blogs'));
	}
	
	public function viewIndex($id){
		$blog = Blog::where('id', $id)->with('user')->first();
		return view('blog.blog', compact('blog', 'id'));
	}
}

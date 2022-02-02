<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogsController extends Controller
{
    public function index() {
		$blogs = Blog::latest()->get();
		return view('blogs.index', compact('blogs'));
	}
	
	public function create() {
		$categories = Category::latest()->get();
		return view('blogs.create', compact('categories'));
	}
	
	public function store(Request $request) {
		$input = $request->all();
		$blog = Blog::create($input);
		//sync cats
		if ($request->category_id) {
			$blog->category()->sync($request->category_id);
		}
		return redirect('/blogs');
	}
	
	public function show($id) {
		$blog = Blog::findOrFail($id);
		return view('blogs.show', compact('blog'));
	}
	
	public function edit($id) {
		$blog = Blog::findOrFail($id);
		return view('blogs.edit', compact('blog'));
	}
	
	public function update(Request $request, $id) {
		$input = $request->all();
		$blog = Blog::findOrFail($id);
		$blog->update($input);
		return redirect('blogs');
	}
	
	public function delete($id) {
		$blog = Blog::findOrFail($id);
		$blog->delete();
		return redirect('blogs');
	}

	public function trash() {
		$trashedBlogs = Blog::onlyTrashed()->get();
		return view('blogs.trash', compact('trashedBlogs'));
	}

	public function restore($id) {
		$restoredBlog = Blog::onlyTrashed()->findOrFail($id);
		$restoredBlog->restore($restoredBlog);
		return redirect('blogs');
	}

	public function permamentDelete($id) {
		$permamentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
		$permamentDeleteBlog->forceDelete($permamentDeleteBlog);
		return back();
	}
 }

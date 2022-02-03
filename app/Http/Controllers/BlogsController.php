<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function index() {
		$blogs = Blog::where('status', 1)->latest()->get();
		return view('blogs.index', compact('blogs'));
	}
	
	public function create() {
		$categories = Category::latest()->get();
		return view('blogs.create', compact('categories'));
	}
	
	public function store(Request $request) {
		$input = $request->all();
		//meta
		$input['slug'] = Str::slug($request['title']);
		$input['meta_title'] = Str::limit($request['title'], 50);
		$input['meta_description'] = Str::limit($request['body'], 150);
		//image
		if ($file = $request->file('featured_image')) {
			$name = uniqid() . $file->getClientOriginalName();
			$file->move('images/featured_images/', $name);
			$input['featured_image'] = $name;
		}
		$blogByUser = $request->user()->blogs()->create($input);
		//sync cats
		if ($request->category_id) {
			$blogByUser->category()->sync($request->category_id);
		}
		return redirect('/blogs');
	}
	
	public function show($id) {
		$blog = Blog::findOrFail($id);
		return view('blogs.show', compact('blog'));
	}
	
	public function edit($id) {
		$blog = Blog::findOrFail($id);
		$categories = Category::latest()->get();

		$bc = array();
		foreach ($blog->category as $c) {
			$bc[] = $c->id;
		}

		$filtered = Arr::except($categories, $bc);

		return view('blogs.edit', compact('blog', 'categories', 'filtered'));
	}
	
	public function update(Request $request, $id) {
		$input = $request->all();
		$blog = Blog::findOrFail($id);
		$blog->update($input);
		//sync cats
		if ($request->category_id) {
			$blog->category()->sync($request->category_id);
		}
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

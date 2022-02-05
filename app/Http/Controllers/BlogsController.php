<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Session;

class BlogsController extends Controller
{

	public function __construct() {
		$this->middleware('author', ['only' => ['create', 'store', 'edit', 'update']]);
		$this->middleware('admin', ['only' => ['delete', 'trash', 'restore', 'permamentDelete']]);
	}

    public function index() {
		$blogs = Blog::where('status', 1)->latest()->get();
		return view('blogs.index', compact('blogs'));
	}
	
	public function create() {
		$categories = Category::latest()->get();
		return view('blogs.create', compact('categories'));
	}
	
	public function store(Request $request) {
		//validate
		$rules = [
			'title' => ['required', 'min:20', 'max:160'],
			'body' => ['required', 'min:200'],
		];
		$this->validate($request, $rules);

		$input = $request->all();
		//meta
		$input['slug'] = Str::slug($request['title']);
		$input['meta_title'] = Str::limit($request['title'], 50);
		$input['meta_description'] = Str::limit($request['body'], 150);
		//image
		if ($file = $request->file('featured_image')) {
			$name = uniqid() . $file->getClientOriginalName();
			$name = Str::lower(Str::replace(' ', '-', $name));
			$file->move('images/featured_images/', $name);
			$input['featured_image'] = $name;
		}
		$blogByUser = $request->user()->blogs()->create($input);
		//sync cats
		if ($request->category_id) {
			$blogByUser->category()->sync($request->category_id);
		}
		Session::flash('blog_created_message', 'Blog created successful - CONGRATS!');
		return redirect('/blogs');
	}
	
	public function show($slug) {
		$blog = Blog::whereSlug($slug)->first();
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
		//image
		if ($file = $request->file('featured_image')) {
			//delete old
			if ($blog->featured_image) {
				unlink('images/featured_images/'.$blog->featured_image);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = Str::lower(Str::replace(' ', '-', $name));
			$file->move('images/featured_images/', $name);
			$input['featured_image'] = $name;
		}
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
		return redirect('blogs/trash');
	}

	public function permamentDelete($id) {
		$permamentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
		$permamentDeleteBlog->forceDelete($permamentDeleteBlog);
		return back();
	}
 }

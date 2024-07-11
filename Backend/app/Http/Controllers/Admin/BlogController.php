<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        //
        $data = Blog::query();
        if (!empty($request->search)) {
            $data = $data->where('title', 'like', '%' . $request->search . '%');
        }
        if (!empty($request->status)) {
            $data = $data->where('status', $request->status);
        }
        $data = $data->paginate(10);
        $categories = Category::where('status', 'Show')->get();

        return view('admin.blog.all', compact('data', 'categories'));
    }

    public function create()
    {
        //
        $categories = Category::where('status', 'Show')->get();

        return view('admin.blog.add', compact('categories'));
    }


    public function store(Request $request)
    {
        //
        $category = Category::where('id', $request->category_id)->first();
        if (!isset($category->id)) {
            Alert::toast('Category Not Found', 'warning');
            return redirect()->back();
        }

        $data = new Blog();
        $data->status = $request->status;
        $data->title = $request->title;
        $data->slug = $this->slugGenerate($request->title, 0);
        $data->category_id = $request->category_id;
        $data->category_slug = $category->slug;
        $data->short_description = $request->short_description;
        $data->description = $request->description;
        $data->author = $request->author;
        $data->is_feature = $request->is_feature;
        if ($request->hasFile('thumbnail')) {
            $data->thumbnail = $request->thumbnail->store('media');
        }
        if ($request->hasFile('banner')) {
            $data->banner = $request->banner->store('media');
        }
        $data->save();
        Alert::toast('Blog Created Successfully', 'success');
        return redirect(route('blog.index'));
    }

    public function show($id)
    {
        //

    }

    public function edit($id)
    {
        //
        $data = Blog::where('id', $id)->first();

        $categories = Category::where('status', 'Show')->get();

        return view('admin.blog.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        //
        $category = Category::where('id', $request->category_id)->first();
        if (!isset($category->id)) {
            Alert::toast('Category Not Found', 'warning');
            return redirect()->back();
        }
        $data = Blog::where('id', $id)->first();
        $data->status = $request->status;
        $data->title = $request->title;
        $data->slug = $this->slugGenerate($request->title, 0);
        $data->category_id = $request->category_id;
        $data->category_slug = $category->slug;
        $data->short_description = $request->short_description;
        $data->description = $request->description;
        $data->author = $request->author;
        $data->is_feature = $request->is_feature;
        if ($request->hasFile('thumbnail')) {
            $data->thumbnail = $request->thumbnail->store('media');
        }
        if ($request->hasFile('banner')) {
            $data->banner = $request->banner->store('media');
        }
        $data->save();

        Alert::success("Blog Updated", 'Successfully');
        return redirect(route('blog.index'));
    }


    public function destroy($id)
    {
        //

        $data = Blog::where('id', $id)->delete();
        if ($data) {
            Alert::success('Deleted Successfully');
            return redirect(route('blog.index'));
        } else {
            Alert::warning('Deletion UnSuccessfull');
            return redirect(route('blog.index'));
        }


    }

    private function slugGenerate($name, $count)
    {

        if (preg_match('/[\/]/', $name)) {
            $name = str_replace('/', '_', $name);
        }
        $slug = ($count == 0) ? strtolower(str_replace(' ', '_', $name)) : strtolower(str_replace(' ', '_', $name)) . $count;

        // Check for uniqueness
        $checkSlug = Blog::where('slug', $slug)->exists();
        if (!$checkSlug) {
            return $slug;
        } else {
            // Increment count and retry
            return $this->slugGenerate($name, $count + 1);
        }
    }
}

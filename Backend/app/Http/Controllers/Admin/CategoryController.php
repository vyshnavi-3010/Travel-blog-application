<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        //
        $data = Category::query();
        if (!empty($request->search)) {
            $data = $data->where('name', "like", "%" . $request->search . "%");
        }
        $data = $data->latest()->paginate(10);
        return view('admin.category.all', compact('data'));

    }


    public function create(Request $request)
    {
        //

    }

    public function store(Request $request)
    {

        $data = new Category();
        $data->name = $request->name;
        $data->slug = $this->slugGenerate($request->name, 0);
        $data->status = 'Show';
        if ($request->hasFile('image')) {
            $data->image = $request->image->store('media');
        }
        $data->save();
        Alert::toast('Category Added Successfully', 'success');
        return redirect(route('category.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Category::find($id);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = Category::where('id', $request->id)->first();
        if (!empty($category->id)) {
            $category->name = $request->name;
            $category->status = $request->status;
            if ($request->hasFile('image')) {
                $category->image = $request->image->store('media');
            }
            $category->save();
            Alert::toast('Category Updated Succesfully', 'success');
            return redirect(route('category.index'));
        } else {
            Alert::toast('Category Not Found', 'warning');
            return redirect(route('category.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Category::where('id', $id)->delete();
        $blogs = Blog::where('category_id', $id)->delete();
        if ($data) {
            Alert::success('Deleted Successfully');
            return redirect(route('category.index'));
        } else {
            Alert::warning('Deletion UnSuccessfull');
            return redirect(route('category.index'));
        }

    }
    private function slugGenerate($name, $count)
    {

        if (preg_match('/[\/]/', $name)) {
            $name = str_replace('/', '_', $name);
        }
        $slug = ($count == 0) ? strtolower(str_replace(' ', '_', $name)) : strtolower(str_replace(' ', '_', $name)) . $count;

        // Check for uniqueness
        $checkSlug = Category::where('slug', $slug)->exists();
        if (!$checkSlug) {
            return $slug;
        } else {
            // Increment count and retry
            return $this->slugGenerate($name, $count + 1);
        }
    }

}

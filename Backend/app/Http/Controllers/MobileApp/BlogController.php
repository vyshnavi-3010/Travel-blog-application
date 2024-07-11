<?php

namespace App\Http\Controllers\MobileApp;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\CategoryCollection;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function getCategories(Request $request)
    {
        $categories = Category::where('status', 'Show');
        if (!empty($request->slug)) {
            $categories = $categories->where('slug', $request->slug);
        }
        $categories = $categories->orderBy('name', 'ASC')->latest()->paginate(10);
        $data = new CategoryCollection($categories);
        if (count($data) > 0) {
            return response()->json([
                'success' => 1,
                'data' => $data,
                'message' => 'Data Fetched Successfully'
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Data Not Found'
            ]);
        }
    }

    public function getBlogs(Request $request)
    {
        $blogs = Blog::where('status', 'Show');
        if (!empty($request->category)) {
            $blogs = $blogs->where('category_slug', $request->category);
        }
        if (!empty($request->slug)) {
            $blogs = $blogs->where('slug', 'like', '%' . $request->slug . '%');
        }
        $blogs = $blogs->latest()->paginate(10);
        $data = new BlogCollection($blogs);
        if (count($data) > 0) {
            return response()->json([
                'success' => 1,
                'data' => $data,
                'message' => 'Data Fetched Successfully'
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Data Not Found'
            ]);
        }
    }

    public function featuredBlogs(Request $request)
    {
        $blogs = Blog::where('status', 'Show');
        $blogs = $blogs->where('is_feature','Yes');
        $blogs = $blogs->latest()->paginate(10);
        $data = new BlogCollection($blogs);
        if (count($data) > 0) {
            return response()->json([
                'success' => 1,
                'data' => $data,
                'message' => 'Data Fetched Successfully'
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Data Not Found'
            ]);
        }
    }
}

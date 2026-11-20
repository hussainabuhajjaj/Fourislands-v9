<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::published()->translatedIn(app()->getLocale())->with('category', 'translations')
            ->orderBy('published_at', 'desc')
            ->paginate(9);
        $data['categories'] = Category::translatedIn(app()->getLocale())->where('is_active', true)->with('translations')->get();
        $data['recent'] = Post::recent(5)->translatedIn(app()->getLocale())->with('translations')->get();
        return view('frontend.blog.index', $data);
    }

    public function show(Request $request)
    {
        $slug = $request->route('slug');

        $data['post'] = Post::published()->translatedIn(app()->getLocale())->with('category', 'translations')
            ->where('slug', $slug)
            ->firstOrFail();
        $data['recent'] = Post::recent(5)->translatedIn(app()->getLocale())->where('id', '!=', $data['post']->id)->with('translations')->get();
        $data['categories'] = Category::translatedIn(app()->getLocale())->where('is_active', true)->with('translations')->get();
        return view('frontend.blog.show', $data);
    }

    public function category(Request $request)
    {
        $slug = $request->route('slug');

        $category = Category::translatedIn(app()->getLocale())->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $data['posts'] = Post::published()->translatedIn(app()->getLocale())->where('category_id', $category->id)
            ->with('category', 'translations')
            ->orderBy('published_at', 'desc')
            ->paginate(9);
        $data['category'] = $category;
        $data['categories'] = Category::translatedIn(app()->getLocale())->where('is_active', true)->with('translations')->get();
        $data['recent'] = Post::recent(5)->translatedIn(app()->getLocale())->with('translations')->get();
        return view('frontend.blog.index', $data);
    }
}

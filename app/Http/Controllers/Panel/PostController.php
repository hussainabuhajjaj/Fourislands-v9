<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $data['title'] = __('Posts');
        return view('panel.posts.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add Post');
        $data['categories'] = Category::where('is_active', true)->get();
        return view('panel.posts.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->only(Post::FILLABLE);
        $data['slug'] = Str::slug($request->get('slug') ?: $request->get('title_en'));
        $data['published_at'] = $request->get('published_at') ?: now();

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('posts');
        } else {
            unset($data['image']);
        }

        $post = Post::create($data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Post::findOrFail($id);
        $data['title'] = __('Edit Post');
        $data['categories'] = Category::where('is_active', true)->get();
        return view('panel.posts.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(Post::FILLABLE);
        $data['slug'] = Str::slug($request->get('slug') ?: $request->get('title_en'));

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('posts');
        } else {
            unset($data['image']);
        }

        $post = Post::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Post::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Post::with('category', 'translations');
        return getDatatable($items, ['translations', 'category']);
    }
}

<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $data['title'] = __('Categories');
        return view('panel.categories.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add Category');
        return view('panel.categories.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->only(Category::FILLABLE);
        $data['slug'] = Str::slug($request->get('slug') ?: $request->get('name_en'));
        $category = Category::create($data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Category::findOrFail($id);
        $data['title'] = __('Edit Category');
        return view('panel.categories.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(Category::FILLABLE);
        $data['slug'] = Str::slug($request->get('slug') ?: $request->get('name_en'));
        $category = Category::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Category::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Category::query();
        return getDatatable($items, ['translations']);
    }
}

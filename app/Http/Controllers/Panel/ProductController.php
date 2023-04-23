<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $data['title'] = __('Products');
        return view('panel.products.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add');

        return view('panel.products.create', $data);
    }

    public function store(ProductRequest $request)
    {

        $data = $request->only(Product::FILLABLE);

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('product');

        } else {
            unset($data['image']);
        }

        $product = Product::create($data)->createTranslation($request);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Product::findOrFail($id);
        $data['title'] = __('Edit');

        return view('panel.products.create', $data);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->only(Product::FILLABLE);

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('product');

        } else {
            unset($data['image']);
        }

        $product = Product::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Product::find($id);

        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Product::query();
//        return getDatatable($items, ['translations', 'sizes' , 'catagory' , 'mainImage']);

        return getDatatable($items, ['translations', 'mainImage']);
    }


}

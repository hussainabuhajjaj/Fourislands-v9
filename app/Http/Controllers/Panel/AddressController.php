<?php

namespace App\Http\Controllers\Panel;

use App\Models\Address;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AddressRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $data['title'] = __('Addresses');
        return view('panel.addresses.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add');

        return view('panel.addresses.create', $data);
    }

    public function store(AddressRequest $request)
    {

        $data = $request->only(Address::FILLABLE);

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('flag');

        } else {
            unset($data['image']);
        }

        $product = Address::create($data)->createTranslation($request);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Address::findOrFail($id);
        $data['title'] = __('Edit');

        return view('panel.addresses.create', $data);
    }

    public function update(AddressRequest $request, $id)
    {
        $data = $request->only(Address::FILLABLE);

        if ($file = $request->file('image')) {
            $path = $file->store('images');

            $data['image'] = Image::create([
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'path' => $path
            ])->id;
        } else {
            unset($data['image']);
        }

        $product = Address::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Address::find($id);

        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Address::query();
//        return getDatatable($items, ['translations', 'sizes' , 'catagory' , 'mainImage']);

        return getDatatable($items, ['translations', 'mainImage']);
    }

}

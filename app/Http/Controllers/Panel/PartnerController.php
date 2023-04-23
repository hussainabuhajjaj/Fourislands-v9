<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
        $data['title'] = __('Partners');
        return view('panel.partners.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add');

        return view('panel.partners.create', $data);
    }

    public function store(PartnerRequest $request)
    {

        $data = $request->only(Partner::FILLABLE);

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('product');

        } else {
            unset($data['image']);
        }

        $product = Partner::create($data);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Partner::findOrFail($id);
        $data['title'] = __('Edit');

        return view('panel.partners.create', $data);
    }

    public function update(PartnerRequest $request, $id)
    {
        $data = $request->only(Partner::FILLABLE);

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('product');

        } else {
            unset($data['image']);
        }

        $product = Partner::updateOrCreate(['id' => $id], $data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Partner::find($id);

        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Partner::query();
//        return getDatatable($items, ['translations', 'sizes' , 'catagory' , 'mainImage']);

        return getDatatable($items);
    }

}

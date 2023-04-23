<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ServiceRequest;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct(Request $request)
    {
        $request['is_home'] = @$request->get('is_home') == "on" ? 1 : 0;
    }

    public function page(){
        return view('panel.promotional-email.promotional_emails');
    }
    public function index()
    {
        $data['title'] = __('Services');
        return view('panel.services.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add');

        return view('panel.services.create', $data);
    }

    public function store(ServiceRequest $request)
    {

        $data = $request->only(Service::FILLABLE);


        if ($file = $request->file('image')) {
            $data['image'] = $file->store('flag');

        } else {
            unset($data['image']);
        }
        if ($file1 = $request->file('large_image')) {
            $data['large_image'] = $file->store('large_image');

        } else {
            unset($data['large_image']);
        }

        $product = Service::create($data)->createTranslation($request);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Service::findOrFail($id);
        $data['title'] = __('Edit');

        return view('panel.services.create', $data);
    }

    public function update(ServiceRequest $request, $id)
    {
        $data = $request->only(Service::FILLABLE);

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('flag');

        } else {
            unset($data['image']);
        }
        if ($file = $request->file('large_image')) {
            $data['large_image'] = $file->store('large_image');

        } else {
            unset($data['large_image']);
        }

        $product = Service::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Service::find($id);

        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Service::query();
//        return getDatatable($items, ['translations', 'sizes' , 'catagory' , 'mainImage']);

        return getDatatable($items, ['translations']);
    }
}

<?php

namespace App\Http\Controllers\Panel;


use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\SliderRequest;
use App\Models\Image;
use App\Models\Slider;


class SliderController extends Controller
{


    public function index()
    {
        $data['title'] = __('Slider');
        return view('panel.sliders.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add');


        return view('panel.sliders.create', $data);
    }

    public function store(SliderRequest $request)
    {
        $data = $request->only(Slider::FILLABLE);

        if ($file = $request->file('image')) {
            $path = $file->store('images');

            $data['image'] = Image::create([
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'path' => $path
            ])->id;
        }
        Slider::create($data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['title'] = __('Edit');
        $data['item'] = Slider::findOrFail($id);
        return view('panel.sliders.create', $data);
    }

    public function update(SliderRequest $request, $id)
    {
        $data = $request->only(Slider::FILLABLE);
        if ($file = $request->file('image')) {
            $path = $file->store('images');

            $data['image'] = Image::create([
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'path' => $path
            ])->id;
        }
        Slider::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Slider::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Slider::query();
        return getDatatable($items);
    }


}

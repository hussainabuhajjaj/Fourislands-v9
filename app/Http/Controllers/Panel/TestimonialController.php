<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        $data['title'] = __('Testimonials');
        return view('panel.testimonials.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add Testimonial');
        return view('panel.testimonials.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->only((new Testimonial)->getFillable());

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('testimonials');
        } else {
            unset($data['image']);
        }

        Testimonial::create($data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Testimonial::findOrFail($id);
        $data['title'] = __('Edit Testimonial');
        return view('panel.testimonials.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only((new Testimonial)->getFillable());

        if ($file = $request->file('image')) {
            $data['image'] = $file->store('testimonials');
        } else {
            unset($data['image']);
        }

        Testimonial::updateOrCreate(['id' => $id], $data);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Testimonial::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Testimonial::query();
        return getDatatable($items);
    }
}

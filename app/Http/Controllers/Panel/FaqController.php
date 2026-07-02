<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    {
        $data['title'] = __('FAQs');
        return view('panel.faqs.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Add FAQ');
        return view('panel.faqs.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->only(Faq::FILLABLE);
        $faq = Faq::create($data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Faq::findOrFail($id);
        $data['title'] = __('Edit FAQ');
        return view('panel.faqs.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(Faq::FILLABLE);
        $faq = Faq::updateOrCreate(['id' => $id], $data)->createTranslation($request);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = Faq::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Faq::query();
        return getDatatable($items, ['translations']);
    }
}

<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index()
    {
        return view('panel.quote-requests.index');
    }

    public function show($id)
    {
        $quoteRequest = QuoteRequest::with(['service', 'product'])->findOrFail($id);
        return view('panel.quote-requests.show', compact('quoteRequest'));
    }

    public function destroy($id, Request $request)
    {
        $item = QuoteRequest::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK)
            : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = QuoteRequest::with(['service', 'product'])->orderByDesc('created_at');
        return getDatatable($items);
    }

    public function updateStatus(Request $request)
    {
        $quoteRequest = QuoteRequest::findOrFail($request->id);
        $quoteRequest->update(['status' => $request->status]);
        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }
}

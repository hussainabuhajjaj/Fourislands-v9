<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('panel.subscribers.index');
    }

    public function datatable()
    {
        $items = Subscriber::orderByDesc('created_at');
        return getDatatable($items);
    }

    public function destroy($id, Request $request)
    {
        $item = Subscriber::find($id);
        return $item->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK)
            : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }
}

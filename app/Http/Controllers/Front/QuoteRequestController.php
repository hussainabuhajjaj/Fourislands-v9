<?php

namespace App\Http\Controllers\Front;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\QuoteRequestRequest;
use App\Models\Product;
use App\Models\QuoteRequest;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $data['settings'] = Setting::all();
        $data['services'] = Service::translatedIn(app()->getLocale())->get()->sortBy('id');
        $data['products'] = Product::translatedIn(app()->getLocale())->get()->sortBy('id');
        return view('frontend.quote-request', $data);
    }

    public function store(QuoteRequestRequest $request)
    {
        if ($request->filled('company_website')) {
            return $this->response_api(true, __('front.msgSent'), StatusCodes::OK);
        }

        $quoteRequest = QuoteRequest::create($request->only([
            'company_name',
            'contact_person',
            'email',
            'phone',
            'service_id',
            'product_id',
            'message',
        ]));

        try {
            $adminEmail = getSetting('email') ?: 'info@fourislands.com';
            Mail::send('emails.quote-request-admin', ['quote' => $quoteRequest], function ($m) use ($adminEmail, $quoteRequest) {
                $m->from($quoteRequest->email, $quoteRequest->contact_person);
                $m->to($adminEmail)->subject('New Quote Request: ' . $quoteRequest->contact_person);
            });
        } catch (\Exception $e) {
        }

        return $this->response_api(true, __('front.msgSent'), StatusCodes::OK);
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Models\Address;
use App\Constants\StatusCodes;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ContactRequest;
use App\Models\Setting;

class ContactController extends Controller
{

    public function index()
    {
        $data['settings'] = Setting::all();
        $data['branches'] =  Address::all();
        return view('frontend.contact',$data);
    }

    public function store(ContactRequest  $request)
    {
        Contact::create($request->all());
        return $this->response_api(true , __('front.msgSent') , StatusCodes::OK);
    }

}

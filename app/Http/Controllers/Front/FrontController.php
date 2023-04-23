<?php

namespace App\Http\Controllers\Front;

use App\Models\Address;
use App\Constants\StatusCodes;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ContactRequest;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $data['services'] = Service::query()->where('is_home',1)->get();
        $data['products'] = Product::all();
        $data['partners'] = Partner::all();
        $data['addresses'] = Address::all();
        $data['sliders'] = Slider::all();
//        dd($data['services']);
        return view('frontend.home', $data);
    }

    public function show($id, $title)
    {
        $title = str_replace('-', ' ', $title);
        $data['item'] = Page::query()->whereId($id)->whereHas('translations', function ($q) use ($title) {
            $q->where('title', 'LIKE', '%' . $title . '%');
        })->first();

        if (!$data['item']) abort(404);

        return view('frontend.home', $data);
    }


    public function store(ContactRequest  $request)
    {
        Contact::create($request->all());
        return $this->response_api(true , __('front.msgSent') , StatusCodes::OK);
    }
}

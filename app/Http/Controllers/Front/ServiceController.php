<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::translatedIn(app()->getLocale())->get()->sortBy('id');
        return view('frontend.services.index',compact('services'));
    }

    public function show(Request $request)
    {
        $id = $request->route('id');

        $data['allservices'] = Service::translatedIn(app()->getLocale())->get();
        $data['services'] = Service::translatedIn(app()->getLocale())->findOrFail($id);
        return view('frontend.services.show',$data);
    }
}

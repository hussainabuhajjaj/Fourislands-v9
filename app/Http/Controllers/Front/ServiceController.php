<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all()->sortBy('id');
        return view('frontend.services.index',compact('services',$services));
    }

    public function show($id)
    {
        $data['allservices'] = Service::all();
        $data['services'] = Service::find($id);
        return view('frontend.services.show',$data);
    }
}

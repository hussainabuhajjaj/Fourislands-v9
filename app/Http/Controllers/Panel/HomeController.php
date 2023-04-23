<?php

namespace App\Http\Controllers\Panel;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $contacts_count= Contact::count();
        $product_Count = Product::count();
        $service_Count = Service::count();
        return view('panel.index', compact('contacts_count','product_Count','service_Count'));
    }
}

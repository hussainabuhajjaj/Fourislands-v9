<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::translatedIn(app()->getLocale())->get();
        return view('frontend.products.index',compact('products'));
    }

    public function show($id)
    {
        $data['allProducts'] = Product::translatedIn(app()->getLocale())->get();
        $data['products']    = Product::translatedIn(app()->getLocale())->find($id);
        return view('frontend.products.show',$data);
    }
}

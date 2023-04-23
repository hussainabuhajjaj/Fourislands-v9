<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.products.index',compact('products',$products));
    }

    public function show($id)
    {
        $data['allProducts'] = Product::all();
        $data['products']    = Product::find($id);
        return view('frontend.products.show',$data);
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $data['faqs'] = Faq::translatedIn(app()->getLocale())->orderBy('ordering')->get();
        return view('frontend.faq.index', $data);
    }
}

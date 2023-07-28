<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Newsletter\Facades\Newsletter;

class NewsletterController extends Controller
{



        public function subscribe(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:subscribers,email',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            try {
                $this->addToNewsletterList($request->input('email'), $request->input('first_name'), $request->input('last_name'));
                return redirect()->back()->with('success', 'Subscription successful. Thank you for subscribing!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: Unable to subscribe at the moment. Please try again later.');
            }
        }

        private function addToNewsletterList($email, $firstName, $lastName)
        {

            Newsletter::subscribe($email, ['FNAME' => $firstName, 'LNAME' => $lastName], 'subscribers', true); // Third parameter 'true' enables double-opt-in
        }

        public function welcome(Request $request){
            return view('welcome');

        }
    }


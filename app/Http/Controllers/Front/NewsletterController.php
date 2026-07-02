<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            Subscriber::create([
                'email' => $request->email,
                'first_name' => $request->first_name ?? '',
                'last_name' => $request->last_name ?? '',
            ]);

            return response()->json([
                'status' => true,
                'message' => __('front.subscribedMailingNews')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => __('front.error')
            ], 500);
        }
    }

    public function unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', $email)->first();
        if ($subscriber) {
            $subscriber->delete();
            return redirect()->route('home.home')->with('success', __('translate.unsubscribe_success'));
        }
        return redirect()->route('home.home')->with('error', __('front.error'));
    }

    public function welcome()
    {
        return view('welcome');
    }
}

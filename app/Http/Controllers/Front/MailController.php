<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mailchimp;

class MailController extends Controller
{
    public function sendNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $listId = env('MAILCHIMP_LIST_ID');
        $mailchimp = new MailChimp(env('MAILCHIMP_APIKEY'));

        $campaign = $mailchimp->campaigns->create('regular', [
            'list_id' => $listId,
            'subject' => 'Welcome Mail',
            'from_email' => 'noreply@devrohit.com',
            'from_name' => 'Devrohit',
            'to_name' => 'Devrohit Subscriber',
        ], [
            'html' => $request->input('body'),
            'text' => strip_tags($request->input('body'))
        ]);

        $mailchimp->campaigns->send($campaign['id']);

        return redirect()->back()->with('success', 'Campaign sent successfully.');
    }
}

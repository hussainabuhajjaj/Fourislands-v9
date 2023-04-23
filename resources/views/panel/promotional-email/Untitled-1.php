<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Requests\SendPromotionalEmailRequest;
use App\Mail\PromotionalEmailMessage;
use App\PromotionalEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PromotionalEmailController extends Controller
{



    public function index()
    {
        $data['title'] = __('Inbox');
        return view('panel.promotional-email.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create Email Template');
        $data['users'] = User::all();
// dd($data['users']);
        return view('panel.promotional-email.create', $data);
    }

public function store(SendPromotionalEmailRequest $request)
{
    $validatedRecipients = collect($request->recipients)->map(function ($recipient) {
        return filter_var(trim($recipient), FILTER_VALIDATE_EMAIL);
    })->filter()->values()->all();

    $invalidEmails = array_diff($request->recipients, $validatedRecipients);

    if (!empty($invalidEmails)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email addresses: ' . implode(', ', $invalidEmails)
        ], 422);
    }
    $attachments = [];

    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $attachment) {
            $path = $attachment->store('public');
            $attachments[] = [
                'name' => $attachment->getClientOriginalName(),
                'path' => $path,
                'type' => $attachment->getClientMimeType(),
            ];
        }
    }

    foreach ($validatedRecipients as $recipient) {
        \Mail::to($recipient)->send(new PromotionalEmailMessage([
            'subject' => $request->subject,
            'message' => $request->message,
            'attachments' => $attachments,
        ], $recipient));
    }

    $promotionalEmail = PromotionalEmail::create([
        'subject' => $request->subject,
        'message' => $request->message,
        'recipients' => json_encode($validatedRecipients),
        'attachments' => $attachments ? json_encode($attachments) : null,
        'status' => PromotionalEmail::STATUS_SENT,
        'total_recipients' => count($validatedRecipients),
    ]);

    return $this->response_api(true, __('front.Success'), StatusCodes::OK);
}

}

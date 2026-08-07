<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\SendPromotionalEmailRequest;
use App\Mail\PromotionalEmailMessage;
use App\Models\PromotionalEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

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
        return view('panel.promotional-email.create', $data);
    }
//    public function validateRecipient()
//    {
//        return collect($this->recipients)->map(function ($recipient) {
//            return filter_var(trim($recipient), FILTER_VALIDATE_EMAIL);
//        })->filter()->values()->toArray();
//    }
//    public function store(SendPromotionalEmailRequest $request): JsonResponse
//    {
//        $validatedData = $request->validated();
//        $validatedRecipients = $request->validatedRecipients();
//
//        $attachments = [];
//        if ($request->hasFile('attachments')) {
//            foreach ($request->file('attachments') as $attachment) {
//                $path = $attachment->store('public');
//                $attachments[] = [
//                    'name' => $attachment->getClientOriginalName(),
//                    'path' => $path,
//                    'type' => $attachment->getClientMimeType(),
//                ];
//            }
//        }
//
//        $promotionalEmail = PromotionalEmail::create([
//            'subject' => $validatedData['subject'],
//            'message' => $validatedData['message'],
//            'recipients' => json_encode($validatedRecipients),
//            'attachments' => $attachments ? json_encode($attachments) : null,
//            'status' => PromotionalEmail::STATUS_SENT,
//            'total_recipients' => count($validatedRecipients),
//        ]);
//
//
//        foreach ($validatedRecipients as $recipient) {
//            if (isset($validatedData['subject']) && isset($validatedData['message'])) {
//                Mail::to($recipient)->send(new PromotionalEmailMessage($validatedData, $recipient));
//            } else {
//                // Handle the case where $validatedData is missing required keys
//            }
//        }
//
//        return response()->json(['message' => __('front.Success')], StatusCodes::OK);
//    }

    public function store(SendPromotionalEmailRequest $request)
    {
        $recipients = $request->recipients ?? [];

        $validatedRecipients = collect($recipients)->map(function ($recipient) {
            return filter_var(trim($recipient), FILTER_VALIDATE_EMAIL);
        })->filter()->values()->all();

        $invalidEmails = array_diff($recipients, $validatedRecipients);

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

        $promotionalEmail = PromotionalEmail::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'recipients' => json_encode($validatedRecipients),
            'attachments' => $attachments ? json_encode($attachments) : null,
            'status' => PromotionalEmail::STATUS_SENT,
            'total_recipients' => count($validatedRecipients),
        ]);

        foreach ($validatedRecipients as $recipient) {
            Mail::to($recipient)->send(new PromotionalEmailMessage([
                'subject' => $request->subject,
                'message' => $request->message,
                'attachments' => $attachments,
            ], $recipient));
        }


        return $this->response_api(true, __('front.Success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['title'] = __('Update Email Template');
        $data['item'] = PromotionalEmail::findOrFail($id);
        $data['users'] = User::all();
        return view('panel.promotional-email.create', $data);
    }

    public function update(Request $request, $id)
    {
        $promotionalEmail = PromotionalEmail::findOrFail($id);
        $recipients = collect($request->recipients ?? [])
            ->map(fn ($recipient) => filter_var(trim($recipient), FILTER_VALIDATE_EMAIL))
            ->filter()
            ->values()
            ->all();

        $attachments = $promotionalEmail->attachments ? json_decode($promotionalEmail->attachments, true) : [];

        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $attachment) {
                $path = $attachment->store('public');
                $attachments[] = [
                    'name' => $attachment->getClientOriginalName(),
                    'path' => $path,
                    'type' => $attachment->getClientMimeType(),
                ];
            }
        }

        $promotionalEmail->update([
            'subject' => $request->subject,
            'message' => $request->message,
            'recipients' => json_encode($recipients),
            'attachments' => $attachments ? json_encode($attachments) : null,
            'total_recipients' => count($recipients),
        ]);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $item = PromotionalEmail::findOrFail($id);

        return $item->delete()
            ? $this->response_api(true, __('front.success'), StatusCodes::OK)
            : $this->response_api(false, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        return getDatatable(PromotionalEmail::query());
    }

}

<?php

namespace App\Http\Requests;

use App\Constants\StatusCodes;
use Illuminate\Http\Exceptions\HttpResponseException;

trait SpamProtection
{
    protected function prepareForValidation()
    {
        if (!$this->ajax()) {
            $this->spamFail();
        }

        $this->validateFormToken();
    }

    protected function spamFail()
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'msg' => __('front.invalid_request')
        ], StatusCodes::VALIDATION_ERROR));
    }

    protected function validateFormToken()
    {
        $token = $this->input('_form_token');
        if (!$token) {
            $this->spamFail();
        }

        try {
            $payload = decrypt($token);
            $elapsed = now()->timestamp - ($payload['time'] ?? 0);
            if ($elapsed < 3 || $elapsed > 14400) {
                $this->spamFail();
            }
            if (($payload['form'] ?? '') !== $this->spamFormName()) {
                $this->spamFail();
            }
        } catch (\Exception $e) {
            $this->spamFail();
        }
    }

    abstract protected function spamFormName(): string;
}

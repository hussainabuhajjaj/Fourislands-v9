<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use App\Http\Requests\SpamProtection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
{
    use SpamProtection;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'   => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:50',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string|max:5000',
            'company_website' => 'nullable|size:0',
            '_form_token' => 'required|string',
        ];
    }

    protected function spamFormName(): string
    {
        return 'contact';
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'msg' => $validator->errors()->first()
        ], StatusCodes::VALIDATION_ERROR));
    }
}

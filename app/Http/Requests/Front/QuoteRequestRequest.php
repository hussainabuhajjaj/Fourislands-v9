<?php

namespace App\Http\Requests\Front;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuoteRequestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_name'   => 'nullable|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:50',
            'service_id'     => 'nullable|exists:services,id',
            'product_id'     => 'nullable|exists:products,id',
            'message'        => 'required|string|max:5000',
            'company_website' => 'nullable|size:0',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'msg' => $validator->errors()->first()
        ], StatusCodes::VALIDATION_ERROR));
    }
}

<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:50',
            'subject'   => 'nullable|string|max:255',
            'message'   => 'required|string|max:5000',
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

<?php

namespace App\Http\Requests\Panel;


use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        $this->id = $this->route('id');
        return auth('admin')->user()->can('add_services');
    }


    public function rules()
    {
        $rules = [
            'image' => 'required_unless:_method,PUT|image',
//            'is_home'=>'nullable|boolean'
        ];
        foreach (locales() as $key => $language) {
            $rules['title_' . $key] = 'required|string';
            $rules['description_' . $key] = 'required|string';
        }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'msg' => $validator->errors()->first()
        ], StatusCodes::VALIDATION_ERROR));
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::UNAUTHORIZED,
            'msg' => 'Your Are not Authorized'
        ], StatusCodes::UNAUTHORIZED));
    }
}

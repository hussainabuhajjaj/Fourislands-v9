<?php

namespace App\Http\Requests\Panel;


use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->user()->can('add_sliders');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [ 'image' => 'required_unless:_method,PUT|image',
        ];
        foreach (locales() as $key => $language) {
            $rules['title_' . $key] = 'required|string|max:255';
            $rules['short_description_' . $key] = 'required|string|max:255';
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
            'msg' => __('no_permission')
        ], StatusCodes::UNAUTHORIZED));
    }
}

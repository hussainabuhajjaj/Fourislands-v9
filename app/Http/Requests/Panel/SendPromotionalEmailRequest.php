<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class SendPromotionalEmailRequest extends FormRequest
{
    /**
     * Check the existence of recipients based on the given email and id.
     *
     * @param string $email
     * @param int $id
     * @return bool
     */
    public function validatedRecipients()
    {
        return collect($this->recipients)->map(function ($recipient) {
            return filter_var(trim($recipient), FILTER_VALIDATE_EMAIL);
        })->filter()->values()->all();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->id = $this->route('id');
        return auth('admin')->user()->can('add_promotional-emails');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachments.*' => 'nullable|mimes:doc,pdf,docx,zip,png,jpg|max:4096',
            'recipients.*' => 'required|exists:users,email' . $this->id,
            'scheduled_at' => 'nullable',
        ];
    }

    /**
     * Get custom validation messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'recipients.*.exists' => 'The :attribute does not exist.',
        ];
    }

    /**
     * Get the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'recipients.*' => 'recipient email',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'msg' => $validator->errors()->first(),
        ], StatusCodes::VALIDATION_ERROR));
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::UNAUTHORIZED,
            'msg' => 'ليس لديك صلاحية',
        ], StatusCodes::UNAUTHORIZED));
    }
}

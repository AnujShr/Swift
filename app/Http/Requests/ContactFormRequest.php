<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'message' => 'required|string|min:15',
            'subject'=> 'required|string|max:150',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'The first name field is required',
            'lname.required' => 'The last name field is required'];
    }
}

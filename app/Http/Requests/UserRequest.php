<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'description' => 'required',
            'avatar' => ['required','mimes:jpeg,bmp,png'],
            'role' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A Name of the user is required',
            'email.required' => 'An Email of the user is required',
            'password.required' => 'A Password of the user is required',
            'description.required' => 'A Description of the user is required',
            'avatar.required' => 'A Photo of the user is required',
            'role.required' => 'A Role of the user is required'
        ];
    }
}

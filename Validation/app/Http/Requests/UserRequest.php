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
    public function rules() // set validation rules
    {
        return [
            'username' => 'required|min:4', 
            'password' => 'required|min:8'
        ];
    }

    public function messages() // customize error message
    {
        return [
            'username.required' => 'Please enter username',
            'username.min' => 'Minimum 4 characters required',
            'password.required' => 'Please enter password',
            'password.min' => 'Minimum 8 characters required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /**
     * Custom Message of Rules Validation
     *
     * @return array
     */    
    public function messages()
    {
        return [
            'email.required' => 'Email Masih Kosong',
            'email.email' => 'Email Salah',
            'password.required' => 'Password Masih Kosong',
        ];
    }
}

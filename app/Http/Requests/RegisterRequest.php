<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8'
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
            'email.required'    => 'Email Masih Kosong',
            'email.email'       => 'Email Salah',
            'email.unique'      => 'Email Sudah Ada',
            'password.required' => 'Password Masih Kosong',
            'password.min'      => 'Password Harus Lebih dari 8',
        ];
    }
}

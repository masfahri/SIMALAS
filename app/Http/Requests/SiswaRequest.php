<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\SiswaModel;
use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
        return SiswaModel::VALIDATION_RULES + User::VALIDATION_RULES;
    }

    /**
     * Set the Message validation rules that apply to the view.
     *
     * @return array
     */
    public function messages()
    {
        return SiswaModel::VALIDATION_MESSAGES + User::VALIDATION_MESSAGES;
    }

    
}

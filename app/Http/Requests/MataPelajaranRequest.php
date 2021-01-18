<?php

namespace App\Http\Requests;

use App\Models\MataPelajaranModel;
use Illuminate\Foundation\Http\FormRequest;

class MataPelajaranRequest extends FormRequest
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
        return MataPelajaranModel::VALIDATION_RULES;
    }

    /**
     * Set the Message validation rules that apply to the view.
     *
     * @return array
     */
    public function messages()
    {
        return MataPelajaranModel::VALIDATION_MESSAGES;
    }
}

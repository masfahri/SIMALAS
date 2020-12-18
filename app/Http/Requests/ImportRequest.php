<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
            'file_import' => 'required|max:10024|mimes:xls,xlsx,csv|file'
        ];
    }

    /**
     * Message the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'file_import.required' => 'Silahkan Pilih File Yang Ingin di Import',
            'file_import.max'      => 'File Upload Melebihi Kapasistas',
            'file_import.mimes'    => 'File Upload Tidak di Dukung'
        ];
    }
}

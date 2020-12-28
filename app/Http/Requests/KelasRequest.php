<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
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
     * Set Attribute of Field 
     * 
     * @return array
     */
    public function attributes()
    {
        return [
            'kd_guru' => 'Guru',
            'kd_kelas' => 'Kelas',
            'kd_sub_kelas' => 'Sub Kelas',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kd_kelas'      => 'required',
            'kd_sub_kelas'  => 'required',
            'kd_guru'       => 'required'
        ];
    }

    /**
     * Set Message the validation Rules
     * 
     * @return array
     */
    public function messages() {
        return [
            'kd_kelas.required' => 'Kelas Dibutuhkan',
            'kd_sub_kelas.required'  => 'Sub Kelas Dibutuhkan',
            'kd_guru.required'   => 'Harap Masukan Wali Kelas'
        ];
    }
}

<?php

namespace App\Http\Requests;

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
        return [
            'nis'               => 'required|numeric|unique:siswa',
            'nisn'              => 'required|numeric|unique:siswa',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'nomor_telf'        => 'required|numeric',
            'agama'             => 'required',
            'nama_ibu'          => 'required',
            'nama_ayah'         => 'required',
        ];
    }

    /**
     * Set Message the validation Rules
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'nis' => [
                'numeric'  => 'NIS Hanya Numerik',
                'unique'   => 'NIS Sudah Digunakan'
            ],
            'nisn' => [
                'numeric'  => 'NISN Hanya Numerik',
                'unique'   => 'NISN Sudah Digunakan'
            ],
            'jenis_kelamin' => [
                'required' => 'Jenis Kelamin Dibutuhkan',
            ],
            'tanggal_lahir' => [
                'required' => 'Tanggal Lahir Dibutuhkan',
                'date'     => 'Tanggal Lahir Hanya Tanggal'
            ],
            'tempat_lahir'  => [
                'required' => 'Tempat Lahir Dibutuhkan',
            ],
            'nomor_telf'    => [
                'required'  => 'Nomor Telf Dibutuhkan',
                'numeric'   => 'Nomor Telf Hanya Numeric'
            ],
            'agama'         => [
                'required'  => 'Agama Dibutuhkan'
            ],
        ];
    }

    
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'nip'               => 'required|numeric|unique:guru',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'nomor_telf'        => 'required|numeric',
            'agama'             => 'required',
            'status_pernikahan' => 'required',
            'nama_ibu'          => 'required',
            'nama_ayah'         => 'required',
            'no_sk'             => 'numeric',
            'nuptk'             => 'numeric',
            'tgl_sk'            => 'date',
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
            'nip.required' => 'NIP Dibutuhkan',
            'nip.unique'   => 'NIP Sudah Digunakan',
            'nip.numeric' => 'NIP Hanya Numerik',

            'jenis_kelamin.required' => 'Jenis Kelamin Dibutuhkan',

            'tanggal_lahir.required' => 'Tanggal Lahir Dibutuhkan',
            'tanggal_lahir.date'     => 'Tanggal Lahir Hanya Tanggal',

            'tempat_lahir.required' => 'Tempat Lahir Dibutuhkan',

            'nomor_telf.required'  => 'Nomor Telf Dibutuhkan',
            'nomor_telf.numeric'   => 'Nomor Telf Hanya Numeric',

            'agama.required'  => 'Agama Dibutuhkan',

            'status_pernikahan.required' => 'Harap Diisi',

            'nama_ibu.required' => 'Harap Diisi',

            'nama_ayah.required' => 'Harap Diisi',

            'no_sk.numeric' => 'Nomor SK Hanya Numerik',

            'nuptk.numeric' => 'NUPTK Harus Numerik',
            
            'tgl_sk.date'  => 'Tanggal SK Hanya Tanggal'
        ];
    }

    
}

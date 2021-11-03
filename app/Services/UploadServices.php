<?php

namespace App\Services;

class UploadServices {

    /**
     * HandleUpload For Import Data
     *
     * @param $params
     * @return void
     */
    public function handleImport($params)
    {
        dd($params);
    }

    /**
     * HandleUpload For Import Data
     *
     * @param $params
     * @return void
     */
    public function handleUploadtoSpecifiedFolder($params)
    {
        // dd($params);
        // // Mendapatkan Nama File

        // // Mendapatkan Extension File
        $extension = $params['file']->getClientOriginalExtension();
        $nama_file = $params['file_name'].'.'.$extension;
        // // Mendapatkan Ukuran File
        // $ukuran_file = $params['file']->getSize();

        // Proses Upload File
        try {
            $destinationPath = 'uploads/'.$params['folder_name'];
            $params['file']->move($destinationPath,$nama_file);
            return array(
                'success' => true,
                'fileName' => $nama_file,
                'extention' => $extension,
                'path' => $destinationPath
            );
        } catch (\Throwable $th) {
            return array('error' => true);
        }

    }
}

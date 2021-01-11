<?php

namespace App\Imports;

use App\Models\User;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\AutoIncrementServices;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImport implements ToCollection, WithHeadingRow, WithStartRow
{
    use Importable;

    public function headingRow(): int
    {
        return 2;
    }
    
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 3;
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        try {
            DB::beginTransaction();
            foreach ($rows as $row) {
                $kdSiswa = $this->getKodeSiswa();  
                $user = User::create([
                    'name'      => $row['nama'],
                    'email'     => $row['email'],
                    'password'  => Hash::make('rahasia')
                ]);
                $user->assignRole('Siswa');
                $siswa = SiswaModel::create([
                    'kd_siswa'      => $kdSiswa,
                    'user_id'       => $user->id,
                    'nis'           => $row['nis'],
                    'nisn'          => $row['nisn'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'tanggal_lahir' => $row['tanggal_lahir'],
                    'agama'         => $row['agama'],
                    'nomor_telf'    => $row['nomor_telf'],
                    'nama_ibu'      => $row['nama_ibu'],
                    'nama_ayah'     => $row['nama_ayah'],
                    'nomor_telf'    => $row['nomor_telf']
                ]);
            }
            DB::commit();
            $status = array('data' => $siswa, 'status' => true, 'feedback' => 'Success');
        } catch (\Throwable $th) {
            DB::rollback();
            $status = array('data' => $th->getMessage().'-'.$th->getLine(), 'status' => false, 'feedback' => 'Fail');
        }
        return $status;
    }

    /**
     * Get Kode Siswa Last
     * 
     * @return String
     */
    public function getKodeSiswa()
    {
        $autoIncrementServices = new AutoIncrementServices();
        $siswaModel = new SiswaModel();
        count($siswaModel::all()) == 0 ? $siswa = 0 : $siswa = $siswaModel->latest('kd_siswa')->first()->kd_siswa;
        $kd_siswa = $autoIncrementServices->handleIncrement(['data' => $siswa, 'prefix' => 'SS-', 'length' => 4]);
        return $kd_siswa;
    }
}

<?php

namespace App\Imports;

use App\Models\User;
use App\Models\GuruModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\AutoIncrementServices;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class GuruImport implements ToCollection, WithHeadingRow, WithStartRow
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
        $kdGuru = $this->getKodeGuru();  
                $user = User::create([
                    'name'      => $row['nama'],
                    'email'     => $row['email'],
                    'password'  => Hash::make('rahasia')
                ]);
                $user->assignRole('Guru');
                $guru = GuruModel::create([
                    'kd_guru'   => $kdGuru,
                    'user_id'   => $user->id,
                    'nip'       => $row['nip'],
                    'nomor_hp'  => $row['nomor_hp'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tanggal_lahir' => $row['tanggal_lahir'],
                    'agama'         => $row['agama'],
                    'status_nikah'  => $row['status_nikah'],
                    'nama_ibu'      => $row['nama_ibu'],
                    'nama_ayah'     => $row['nama_ayah'],
                    'status_kepegawaian' => $row['status_kepegawaian'],
                    'jenis_ptk'          => $row['jenis_ptk'],
                    'lemabaga_sertifikasi'  => $row['lembaga_sertifikasi'],
                    'no_sk'                 => $row['nomor_sk'],
                    'tgl_sk'                => $row['tanggal_sk'],
                    'nuptk'                 => $row['nuptk'],
                    'tmt_tugas'             => $row['tmt_tugas'],
                    'tugas_tambahan'        => $row['tugas_tambahan'],
                ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        return 1;
    }

    // /**
    //  * Rules
    //  * 
    //  * @return Boolean
    //  */
    // public function rules(): array
    // {
    //     return [
    //         '0' => 'required',
    //         '1' => 'unique:users,email'
    //     ];
    // }

    /**
     * Get Kode Guru Last
     * 
     * @return String
     */
    public function getKodeGuru()
    {
        $autoIncrementServices = new AutoIncrementServices();
        $guruModel = new GuruModel();
        count($guruModel::all()) == 0 ? $guru = 0 : $guru = $guruModel->latest('kd_guru')->first()->kd_guru;
        $kd_guru = $autoIncrementServices->handleIncrement(['data' => $guru, 'prefix' => 'GR-', 'length' => 4]);
        return $kd_guru;
    }
}

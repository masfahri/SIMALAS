<?php

namespace Database\Seeders;

use App\Models\SubKelasModel;
use Illuminate\Database\Seeder;

class SubKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subkelas = [
            [
                'name'      => 'Satu',
                'kd_sub_kelas'  => '1',
            ],
            [
                'name'      => 'Dua',
                'kd_sub_kelas'  => '2',
            ],
            [
                'name'      => 'Tiga',
                'kd_sub_kelas'  => '3',
            ],
            [
                'name'      => 'Empat',
                'kd_sub_kelas'  => '4',
            ],
            [
                'name'      => 'Lima',
                'kd_sub_kelas'  => '5',
            ],
            [
                'name'      => 'Enam',
                'kd_sub_kelas'  => '6',
            ],
            [
                'name'      => 'Tujuh',
                'kd_sub_kelas'  => '7',
            ],
            [
                'name'      => 'Delapan',
                'kd_sub_kelas'  => '8',
            ],
            [
                'name'      => 'Sembilan',
                'kd_sub_kelas'  => '9',
            ],
        ];
        foreach ($subkelas as $key) {
            SubKelasModel::create($key);
        }

    }
}

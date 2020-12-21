<?php

namespace Database\Seeders;

use App\Models\KelasModel;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = KelasModel::create([
            'name'      => 'Dua Belas',
            'kd_kelas'  => 'XII',
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\MataPelajaranModel;
use Illuminate\Database\Seeder;

class MatapelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BING = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0001',
            'summon'   => 'BING',
            'nama_mapel' => 'Bahasa Inggris'
        ]);
        $BIND = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0002',
            'summon'   => 'BIND',
            'nama_mapel' => 'Bahasa Indonesia'
        ]);
        $MTK = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0003',
            'summon'   => 'MTK',
            'nama_mapel' => 'Matematika'
        ]);
        $AGAMA = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0004',
            'summon'   => 'AGAMA',
            'nama_mapel' => 'Agama Islam'
        ]);
        $FQH = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0005',
            'summon'   => 'FQH',
            'nama_mapel' => 'Fiqih'
        ]);
        $AQA = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0006',
            'summon'   => 'AQA',
            'nama_mapel' => 'Aqidah Akhlak'
        ]);
        $PJOK = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0007',
            'summon'   => 'PJOK',
            'nama_mapel' => 'Olahraga'
        ]);
        $TIK = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0008',
            'summon'   => 'TIK',
            'nama_mapel' => 'Teknologi Informasi & Komputerisasi'
        ]);
        $IPA = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0009',
            'summon'   => 'IPA',
            'nama_mapel' => 'Ilmu Pengetahuan Alam'
        ]);
        $IPS = MataPelajaranModel::create([
            'kd_mapel' => 'MPL-0010',
            'summon'   => 'IPS',
            'nama_mapel' => 'Ilmu Pengetahuan Sosial'
        ]);

    }
}

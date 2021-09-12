<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiswaModel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\AutoIncrementServices;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gender = $faker->randomElement(['male', 'female']);
        $kd_siswa = 0000;
        $nis = 99200000;
        try {
            DB::beginTransaction();
            for ($i=1; $i < 100; $i++) { 
                $user = User::create([
                    'name'      => $faker->name($gender),
                    'email'     => $faker->email,
                    'password'  => Hash::make('rahasia')
                ]);
                $user->assignRole('Siswa');
                $siswa = SiswaModel::create([
                    'kd_siswa'      => 'SS-'.$kd_siswa++,
                    'user_id'       => $user->id,
                    'nis'           => $nis++,
                    'nisn'          => $faker->unique()->numberBetween(1411501000, 1411501438),
                    'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                    'tanggal_lahir' => $faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('d/m/Y'),
                    'agama'         => 'Islam',
                    'nomor_telf'    => $faker->phoneNumber,
                    'nama_ibu'      => $faker->name($gender),
                    'nama_ayah'     => $faker->name($gender),
                    'pas_foto'      => 'null'
                ]);
    
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            print($th->getMessage());
        }
        
    }
}

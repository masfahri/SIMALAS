<?php

namespace Database\Seeders;

use App\Models\GuruModel;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\AutoIncrementServices;


class GuruSeeder extends Seeder
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
        $kd_guru = 0000;
        $nip = 11200000;
        try {
            DB::beginTransaction();
            for ($i=1; $i < 100; $i++) {
                $user = User::create([
                    'name'      => $faker->name($gender),
                    'email'     => $faker->email,
                    'password'  => Hash::make('rahasia')
                ]);
                $user->assignRole('Siswa');
                $siswa = GuruModel::create([
                    'kd_guru'      => 'GR-'.$kd_guru++,
                    'user_id'       => $user->id,
                    'nip'          => $faker->unique()->numberBetween(559100, 559200),
                    'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                    'flag'          => $faker->randomElement(['active', 'de-active']),
                    'tanggal_lahir' => $faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('Y-m-d'),
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

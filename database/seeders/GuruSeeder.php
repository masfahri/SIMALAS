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
            $guru1 = User::create([
                'name' => 'Guru Kelas X-1',
                'email' => 'guru.kelas.x1@simalas.com',
                'password' => bcrypt('asdasdasd')
            ]);

            GuruModel::create([
                'kd_guru'      => $this->getKodeGuru(),
                'user_id'       => $guru1->id,
                'nip'          => $faker->unique()->numberBetween(100000, 200000),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'flag'          => $faker->randomElement(['active', 'de-active']),
                'tanggal_lahir' => $faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('Y-m-d'),
                'agama'         => 'Islam',
                'nomor_telf'    => $faker->phoneNumber,
                'nama_ibu'      => $faker->name($gender),
                'nama_ayah'     => $faker->name($gender),
                'pas_foto'      => 'null'
            ]);

            $guru2 = User::create([
                'name' => 'Guru Kelas X-2',
                'email' => 'guru.kelas.x2@simalas.com',
                'password' => bcrypt('asdasdasd')
            ]);
            GuruModel::create([
                'kd_guru'      => $this->getKodeGuru(),
                'user_id'       => $guru2->id,
                'nip'          => $faker->unique()->numberBetween(100000, 200000),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'flag'          => $faker->randomElement(['active', 'de-active']),
                'tanggal_lahir' => $faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('Y-m-d'),
                'agama'         => 'Islam',
                'nomor_telf'    => $faker->phoneNumber,
                'nama_ibu'      => $faker->name($gender),
                'nama_ayah'     => $faker->name($gender),
                'pas_foto'      => 'null'
            ]);
            
            $guru3 = User::create([
                'name' => 'Guru Kelas X-3',
                'email' => 'guru.kelas.x3@simalas.com',
                'password' => bcrypt('asdasdasd')
            ]);
            GuruModel::create([
                'kd_guru'      => $this->getKodeGuru(),
                'user_id'       => $guru3->id,
                'nip'          => $faker->unique()->numberBetween(100000, 200000),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'flag'          => $faker->randomElement(['active', 'de-active']),
                'tanggal_lahir' => $faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('Y-m-d'),
                'agama'         => 'Islam',
                'nomor_telf'    => $faker->phoneNumber,
                'nama_ibu'      => $faker->name($gender),
                'nama_ayah'     => $faker->name($gender),
                'pas_foto'      => 'null'
            ]);

            for ($i=1; $i < 100; $i++) {
                $user = User::create([
                    'name'      => $faker->name($gender),
                    'email'     => $faker->email,
                    'password'  => Hash::make('rahasia')
                ]);
                $user->assignRole('Siswa');
                $siswa = GuruModel::create([
                    'kd_guru'      => $this->getKodeGuru(),
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

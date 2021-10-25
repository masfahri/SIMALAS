<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UsersAdminSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(MatapelajaranSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(SubKelasSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'Admin SIMALAS',
            'email' => 'admin@simalas.com',
            'password' => bcrypt('asdasdasd'),
        ]);

        $user->assignRole('Admin');
    }
}

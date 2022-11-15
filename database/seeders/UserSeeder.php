<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'alceo',
            'email' => 'adminSuper@alceo.my.id',
            'password' => bcrypt('qazwsxedc')
        ]);

        $superAdmin->assignRole('super admin');

        $admin = User::create([
            'name' => 'alceo admin',
            'email' => 'admin@alceo.my.id',
            'password' => bcrypt('qazwsxedc')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'alceo user',
            'email' => 'user@alceo.my.id',
            'password' => bcrypt('qazwsxedc')
        ]);

        $user->assignRole('guest');
    }
}

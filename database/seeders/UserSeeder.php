<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'all']);
        Role::create(['name' => 'ADMIN'])->givePermissionTo($permission);

        User::create([
            'name' => 'Admin',
            'email' => 'ahlam.m.alfashq@gmail.com',
            'email_verified_at' => now(),
            'password' =>bcrypt( '123456789')
        ])->assignRole('ADMIN');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' =>bcrypt( '123456789')
        ])->assignRole('ADMIN');
    }
}

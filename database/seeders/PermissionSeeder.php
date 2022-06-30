<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Permission::truncate();

        $arrayOfPermissionNames = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-activate',

//            'city-list',
//            'city-create',
//            'city-edit',
//            'city-delete',
//            'city-activate',
//
//            'country-list',
//            'country-create',
//            'country-edit',
//            'country-delete',
//            'country-activate',
//
//            'service-point-list',
//            'service-point-create',
//            'service-point-edit',
//            'service-point-delete',
//            'service-point-activate',
//
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            'exchange-rate-list',
            'exchange-rate-create',
            'exchange-rate-edit',
            'exchange-rate-delete',

            'report-list',
            'report-create',
            'report-edit',
            'report-delete',

            'news-list',
            'news-create',
            'news-edit',
            'news-delete',

            'job-list',
            'job-create',
            'job-edit',
            'job-delete',

            'principle-list',
            'principle-create',
            'principle-edit',
            'principle-delete',

            'about-list',
            'about-edit',

            'vision-list',
            'vision-edit',

            'strategy-list',
            'strategy-edit',

            'policy-list',
            'policy-edit',

            'social-list',
            'social-edit',

            'contact-list',
            'contact-edit',

        ];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        DB::table('permissions')->insert($permissions->toArray());

        Role::create([
            'name'          =>  "SUPER_ADMIN",
            'display_name'   => "SUPER_ADMIN",
        ])->givePermissionTo(Permission::all());

        Role::create([
            'name'          =>  "ADMIN",
            'display_name'   => "ADMIN",
        ])->givePermissionTo(Permission::all());;


    }
}

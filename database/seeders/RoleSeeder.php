<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'       => 'Admin',
            'display_name'   => 'الأدمن',
         
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name'       => 'User',
            'display_name'   => 'مستخدم',

            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name'       => 'super_admin',
            'display_name'   => 'الادمن الاعلى',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

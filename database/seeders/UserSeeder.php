<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name        = "admin";  
        $admin->email       = "admin@gmail.com";
        $admin->password    = Hash::make('123');
        $admin->is_active   = 1;
        $admin->created_at  = now();
        $admin->updated_at  = now();
        $admin->save();
        $admin->attachRole('super_admin');
    }
}

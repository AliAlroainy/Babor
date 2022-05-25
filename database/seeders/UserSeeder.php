<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
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
        $admin->email_verified_at=now();
        $admin->password    = Hash::make('123456');
        $admin->is_active   = 1;
        $admin->created_at  = now();
        $admin->updated_at  = now();
        $admin->remember_token =Str::random(10);
        $admin->save();
        $admin->attachRole('super_admin');

        $Jehad = new User;
        $Jehad->name        = "Jehad";
        $Jehad->email       = "deeppp901@gmail.com";
        $Jehad->email_verified_at=now();
        $Jehad->password    =Hash::make('123456');
        $Jehad->is_active   = 1;
        $Jehad->created_at  = now();
        $Jehad->updated_at  = now();
        $Jehad->remember_token =Str::random(10);
        $Jehad->save();
        $Jehad->attachRole('user');

        $Abrar = new User;
        $Abrar->name        = "Abrar";
        $Abrar->email       = "abrar.abdulwahed@gmail.com";
        $Abrar->email_verified_at=now();
        $Abrar->password    =Hash::make('123456');
        $Abrar->is_active   = 1;
        $Abrar->created_at  = now();
        $Abrar->updated_at  = now();
        $Abrar->remember_token =Str::random(10);
        $Abrar->save();
        $Abrar->attachRole('user');

        $Reem = new User;
        $Reem->name        = "Reem";
        $Reem->email       = "Reem@gmail.com";
        $Reem->email_verified_at=now();
        $Reem->password    =Hash::make('123456');
        $Reem->is_active   = 1;
        $Reem->created_at  = now();
        $Reem->updated_at  = now();
        $Reem->remember_token =Str::random(10);
        $Reem->save();
        $Reem->attachRole('user');

        $Ali = new User;
        $Ali->name        = "Ali";
        $Ali->email       = "Ali@gmail.com";
        $Ali->email_verified_at=now();
        $Ali->password    =Hash::make('123456');
        $Ali->is_active   = 1;
        $Ali->created_at  = now();
        $Ali->updated_at  = now();
        $Ali->remember_token =Str::random(10);
        $Ali->save();
        $Ali->attachRole('user');

        $Hamad = new User;
        $Hamad->name        = "Hamad";
        $Hamad->email       = "Hamad@gmail.com";
        $Hamad->email_verified_at=now();
        $Hamad->password    =Hash::make('123456');
        $Hamad->is_active   = 1;
        $Hamad->created_at  = now();
        $Hamad->updated_at  = now();
        $Hamad->remember_token =Str::random(10);
        $Hamad->save();
        $Hamad->attachRole('user');

        $Erada = new User;
        $Erada->name        = "Erada";
        $Erada->email       = "Erada@gmail.com";
        $Erada->email_verified_at=now();
        $Erada->password    =Hash::make('123456');
        $Erada->is_active   = 1;
        $Erada->created_at  = now();
        $Erada->updated_at  = now();
        $Erada->remember_token =Str::random(10);
        $Erada->save();
        $Erada->attachRole('user');

        $Nashwan = new User;
        $Nashwan->name        = "Nashwan";
        $Nashwan->email       = "Nashwan@gmail.com";
        $Nashwan->email_verified_at=now();
        $Nashwan->password    =Hash::make('123456');
        $Nashwan->is_active   = 1;
        $Nashwan->created_at  = now();
        $Nashwan->updated_at  = now();
        $Nashwan->remember_token =Str::random(10);
        $Nashwan->save();
        $Nashwan->attachRole('user');

        $Mokhtar = new User;
        $Mokhtar->name        = "Mokhtar";
        $Mokhtar->email       = "Mokhtar@gmail.com";
        $Mokhtar->email_verified_at=now();
        $Mokhtar->password    =Hash::make('123456');
        $Mokhtar->is_active   = 1;
        $Mokhtar->created_at  = now();
        $Mokhtar->updated_at  = now();
        $Mokhtar->remember_token =Str::random(10);
        $Mokhtar->save();
        $Mokhtar->attachRole('user');

        $Haitham = new User;
        $Haitham->name        = "Haitham";
        $Haitham->email       = "Haitham@gmail.com";
        $Haitham->email_verified_at=now();
        $Haitham->password    =Hash::make('123456');
        $Haitham->is_active   = 1;
        $Haitham->created_at  = now();
        $Haitham->updated_at  = now();
        $Haitham->remember_token =Str::random(10);
        $Haitham->save();
        $Haitham->attachRole('user');
}}


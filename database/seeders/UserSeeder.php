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
        $admin->password    = Hash::make('123');
        $admin->is_active   = 1;
        $admin->created_at  = now();
        $admin->updated_at  = now();
        $admin->save();
        $admin->attachRole('super_admin');
        $admin->remember_token =Str::random(30);


        $Jehad = new User;
        $Jehad->name        = "Jehad";
        $Jehad->email       = "Jehad@gmail.com";
        $Jehad->password    = Hash::make('123');
        $Jehad->is_active   = 1;
        $Jehad->created_at  = now();
        $Jehad->updated_at  = now();
        $Jehad->save();
        $Jehad->attachRole('user');
        $Jehad->remember_token =Str::random(30);

        $Abrar = new User;
        $Abrar->name        = "Abrar";
        $Abrar->email       = "Abrar@gmail.com";
        $Abrar->password    = Hash::make('123');
        $Abrar->is_active   = 1;
        $Abrar->created_at  = now();
        $Abrar->updated_at  = now();
        $Abrar->save();
        $Abrar->attachRole('user');
        $Abrar->remember_token =Str::random(30);

        $Reem = new User;
        $Reem->name        = "Reem";
        $Reem->email       = "Reem@gmail.com";
        $Reem->password    = Hash::make('123');
        $Reem->is_active   = 1;
        $Reem->created_at  = now();
        $Reem->updated_at  = now();
        $Reem->save();
        $Reem->attachRole('user');
        $Reem->remember_token =Str::random(30);

        $Ali = new User;
        $Ali->name        = "Ali";
        $Ali->email       = "Ali@gmail.com";
        $Ali->password    = Hash::make('123');
        $Ali->is_active   = 1;
        $Ali->created_at  = now();
        $Ali->updated_at  = now();
        $Ali->save();
        $Ali->attachRole('user');
        $Ali->remember_token =Str::random(30);

        $Hamad = new User;
        $Hamad->name        = "Hamad";
        $Hamad->email       = "Hamad@gmail.com";
        $Hamad->password    = Hash::make('123');
        $Hamad->is_active   = 1;
        $Hamad->created_at  = now();
        $Hamad->updated_at  = now();
        $Hamad->save();
        $Hamad->attachRole('user');
        $Hamad->remember_token =Str::random(30);

        $Erada = new User;
        $Erada->name        = "Erada";
        $Erada->email       = "Erada@gmail.com";
        $Erada->password    = Hash::make('123');
        $Erada->is_active   = 1;
        $Erada->created_at  = now();
        $Erada->updated_at  = now();
        $Erada->save();
        $Erada->attachRole('user');
        $Erada->remember_token =Str::random(30);

        $Nashwan = new User;
        $Nashwan->name        = "Nashwan";
        $Nashwan->email       = "Nashwan@gmail.com";
        $Nashwan->password    = Hash::make('123');
        $Nashwan->is_active   = 1;
        $Nashwan->created_at  = now();
        $Nashwan->updated_at  = now();
        $Nashwan->save();
        $Nashwan->attachRole('user');
        $Nashwan->remember_token =Str::random(30);

        $Mokhtar = new User;
        $Mokhtar->name        = "Mokhtar";
        $Mokhtar->email       = "Mokhtar@gmail.com";
        $Mokhtar->password    = Hash::make('123');
        $Mokhtar->is_active   = 1;
        $Mokhtar->created_at  = now();
        $Mokhtar->updated_at  = now();
        $Mokhtar->save();
        $Mokhtar->attachRole('user');
        $Mokhtar->remember_token =Str::random(30);

        $Haitham = new User;
        $Haitham->name        = "Haitham";
        $Haitham->email       = "Haitham@gmail.com";
        $Haitham->password    = Hash::make('123');
        $Haitham->is_active   = 1;
        $Haitham->created_at  = now();
        $Haitham->updated_at  = now();
        $Haitham->save();
        $Haitham->attachRole('user');
        $Haitham->remember_token =Str::random(30);



}}


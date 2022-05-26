<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        DB::table('profiles')->insert([
            'username' => 'جهاد المليكي',
            'city' => 'Taiz',
            'address' => 'الروضه ،جوار جامع التقوى ،فوق مدرسه المعالي',
            'avatar' => 'jihad.jpg',
            'phone' => '737-780-703',
            'bio'=> $faker->sentence(10),
            'job' => 'Software Engineering',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '2',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Abrar',
            'city' => 'Taiz City',
            'address' => 'المسبح الأعلى، جوار مدرسة النبراس الأهلية',
            'avatar' => 'abrar.jpg',
            'phone' => '736-565-237',
            'bio'=> 'مهتمة بتصميم وبرمجة مواقع الويب',
            'job' => 'IT Engineering',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '3',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Reem',
            'city' => 'Taiz City',
            'address' => 'شارع جمال ،    ',
            'avatar' => 'reem.jpg',
            'phone' => '775-301-706',
            'bio'=> 'مهتمة بتصميم وبرمجة مواقع الويب',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '4',
        ]);

        DB::table('profiles')->insert([
            'username' => 'علي الرعيني',
            'city' => 'مدينة تعز ',
            'address' => ' القاهرة ،    ',
            'avatar' => 'ali.jpg',
            'phone' => '773-739-473',
            'bio'=> 'مهتم بتصميم وبرمجة مواقع الويب',
            'job' => ' UXUI Designer',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '5',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Hamad',
            'city' => 'Taiz City',
            'address' => 'شارع التحرير، جوار فندق الشريف',
            'avatar' => 'hamad.jpg',
            'phone' => '714722084',
            'bio'=> 'مهتم بتصميم وبرمجة مواقع الويب',
            'job' => 'Web Developer',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '6',
        ]);

        DB::table('profiles')->insert([
            'username' => 'اراده الفقي',
            'city' => 'Sanaa',
            'address' => 'صنعاء، شارع حده',
            'avatar' => 'erada.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> 'مهتمه بتصميم وبرمجة مواقع الويب',
            'job' => 'Supervisor',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '7',
        ]);

        DB::table('profiles')->insert([
            'username' => 'نشوان',
            'city' => 'Sanaa',
            'address' => 'صنعاء، شارع حده',
            'avatar' => 'nashwan.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> 'مهتم بتصميم وبرمجة مواقع الويب',
            'job' => 'Projet Manager',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '8',
        ]);

        DB::table('profiles')->insert([
            'username' => 'مختار غالب',
            'city' => 'Sanaa',
            'address' => 'صنعاء، شارع حده',
            'avatar' => 'mokhtar.png',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> 'مهتم بتصميم وبرمجة مواقع الويب',
            'job' => 'Product Manager',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '9',
        ]);


        DB::table('profiles')->insert([
            'username' => 'هيثم المقطري',
            'city' => 'Sanaa',
            'address' => 'صنعاء، شارع حده',
            'avatar' => 'haitham.png',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> 'مهتم بتصميم وبرمجة مواقع الويب',
            'job' => 'Super Sponsor',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '10',
        ]);
    }
}

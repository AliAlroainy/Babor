<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class reviewRattingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('review_ratings')->insert([
            'user_id' => '2',
            'name'=> 'أبرار الخراساني',
            'comments' => 'شخص ثقة',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()

        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'جهاد المليكي',
            'comments' => 'ممتاز ،انصح بالتعامل مع هذا البائع',
            'star_rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'علي الرعيني',
            'comments' => 'شخص ثقة لكنه يتأخر قليلا في تسليم المتفق عليه',
            'star_rating' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'حمد البكيل',
            'comments' => 'التعامل معه جيد لا بأس به',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'هيثم المقطري',
            'comments' => 'موقع بابور موقع امن دائما يوفر افضل مقدمي العروض',
            'star_rating' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '6',
            'name'=> 'اراده الفقي',
            'comments' => 'هذا الشخص ثقة، سأكرر معه المعاملة مرة أخرى',
            'star_rating' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '7',
            'name'=> 'مختار غالب',
            'comments' => 'دائما يقدم اضخم العروض للسيارات بالشرق الاوسط',
            'star_rating' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '8',
            'name'=> 'أبرار الخراساني',
            'comments' => 'أكثر شخص أحب التعامل معه',
            'star_rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'هيفاء نبيل',
            'comments' => 'عروضه دائما تبهرني، فعلا يستحق التشجيع ',
            'star_rating' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'رقيه عبده',
            'comments' => 'التعامل معه لا بأس به، أراه شخص عصبي',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

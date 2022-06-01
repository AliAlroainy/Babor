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
            'comments' => 'تأخر عني في تسليم سيارتي ويتحجج بالظروف',
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
            'comments' => 'التعامل معه غير جيد',
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
            'comments' => 'للأمانة الصور قليلا مغايرة للواقع',
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
            'comments' => 'شخص عصبي ولم أحب التعامل معه لكنه سلم العرض',
            'star_rating' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'رقيه عبده',
            'comments' => 'لن أكرر التعامل معه البتة',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

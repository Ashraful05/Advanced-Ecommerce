<?php

namespace Database\Seeders;

use App\Models\Seo;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=0;$i<=5;$i++){
            Seo::create([
                'meta_title'=>$faker->title,
                'meta_author'=>$faker->name,
                'meta_keyword'=>strtolower($faker->title),
                'meta_description'=>$faker->text,
                'google_analytics'=>'google_analytics'
            ]);
        }

    }
}

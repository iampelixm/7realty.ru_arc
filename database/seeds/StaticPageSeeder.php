<?php

use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'name' 		=> 'Наши клиенты',
            'slug' 		=> 'clients',
            'text' 		=> 'Наши клиенты'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'Работа у нас',
            'slug' 		=> 'work',
            'text' 		=> 'Работа у нас'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'Почему мы',
            'slug' 		=> 'why_we',
            'text' 		=> 'Почему мы'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'О нас',
            'slug' 		=> 'about_us',
            'text' 		=> 'О нас'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'Агентские услуги',
            'slug' 		=> 'agency',
            'text' 		=> 'Агентские услуги'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'Консалтинг и аналитика',
            'slug' 		=> 'analitics',
            'text' 		=> 'Консалтинг и аналитика'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'Управление продажами',
            'slug' 		=> 'managment',
            'text' 		=> 'Управление продажами'
        ]);

        DB::table('pages')->insert([
            'name' 		=> 'Юридическое сопровождение',
            'slug' 		=> 'support',
            'text' 		=> 'Юридическое сопровождение'
        ]);

        


    }
}

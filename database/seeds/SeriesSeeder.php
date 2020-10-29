<?php

use Illuminate\Database\Seeder;
use App\Series;
use App\Video;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::truncate();
        factory(Series::Class,10)->create()->each(function($series){
            $series->videos()->saveMany(factory(Video::Class,15)->make());
        });
    }
}

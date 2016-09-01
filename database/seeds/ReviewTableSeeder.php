<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new App\Review(['user_id'=>'2','driver_id'=>'2','rating'=>'5','review_desc'=>'Good experience']))->save();
        (new App\Review(['user_id'=>'3','driver_id'=>'4','rating'=>'4','review_desc'=>'Good experience as ever']))->save();
        (new App\Review(['user_id'=>'4','driver_id'=>'5','rating'=>'4','review_desc'=>'Good experience cant get better']))->save();
        (new App\Review(['user_id'=>'5','driver_id'=>'6','rating'=>'3','review_desc'=>'Good ']))->save();
        (new App\Review(['user_id'=>'6','driver_id'=>'8','rating'=>'4','review_desc'=>'Good job']))->save();
        (new App\Review(['user_id'=>'7','driver_id'=>'7','rating'=>'3','review_desc'=>'Good stuff']))->save();
        (new App\Review(['user_id'=>'7','driver_id'=>'2','rating'=>'3','review_desc'=>'Good stuff']))->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Offer(['title'=>'Nano cab offer', 'description' => "Get a discount of 50% for any nano cab ride of more than 5 Kms.", 'imageUrl' => '/img/default_offer_image.png']))->save();
        (new \App\Offer(['title'=>'Toyota Prius offer', 'description' => "Enjoy a ride in a luxury toyota prius car just for Rs. 50/= per 1 Km. Limited offer.", 'imageUrl' => '/img/default_offer_image.png']))->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class TaxiDriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\TaxiDriver(['licenceNo'=>'15243A', 'id'=>'2', 'taxiId'=>1, 'email'=>'anuradhawick@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'29845F', 'id'=>'3', 'taxiId'=>2, 'email'=>'ravidu@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'34412G', 'id'=>'4', 'taxiId'=>3, 'email'=>'jayan@gmail.com']))->save();
        
        (new \App\TaxiDriver(['licenceNo'=>'76864W', 'id'=>'5', 'taxiId'=>5, 'email'=>'eranga@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'15348C', 'id'=>'6', 'taxiId'=>6, 'email'=>'roshan@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'76895D', 'id'=>'7', 'taxiId'=>7, 'email'=>'imesha@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'16248X', 'id'=>'8', 'taxiId'=>8, 'email'=>'pasindu@gmail.com']))->save();
        
        (new \App\TaxiDriver(['licenceNo'=>'68348Z', 'id'=>'9', 'taxiId'=>9, 'email'=>'kanchana@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'28348V', 'id'=>'10', 'taxiId'=>10, 'email'=>'melanka@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'81348Q', 'id'=>'11', 'taxiId'=>11, 'email'=>'keet@gmail.com']))->save();

        (new \App\TaxiDriver(['licenceNo'=>'41348Y', 'id'=>'12', 'email'=>'danuja@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'29348R', 'id'=>'13', 'email'=>'sineth@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'36348T', 'id'=>'14', 'email'=>'nadun@gmail.com']))->save();
        (new \App\TaxiDriver(['licenceNo'=>'66348P', 'id'=>'15', 'email'=>'udara@gmail.com']))->save();
    }
}

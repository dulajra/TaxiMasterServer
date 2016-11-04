<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Customer(['id'=>18, 'email'=>'kasun@gmail.com', 'address'=>'100, Bandaranayake Rd, Katubedda']))->save();
    }
}

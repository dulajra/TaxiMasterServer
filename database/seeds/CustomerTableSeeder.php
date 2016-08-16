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
        (new \App\Customer(['id'=>18 ,'oneSignalUserId'=>'957d23b3-8873-4da4-a01c-2e7653bc9086']))->save();
    }
}

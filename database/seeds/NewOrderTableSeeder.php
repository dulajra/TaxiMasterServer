<?php

use Illuminate\Database\Seeder;

class NewOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\NewOrder(['origin' => 'Dehiwala', 'originLatitude' => 6.857396, 'originLongitude' => 79.861054, 'destination' => 'Borella', 'destinationLatitude' => 6.913795, 'destinationLongitude' => 79.880233, 'time' => '2016-06-08 07:12:00', 'contact' => '0712481879', 'state' => 'REJECTED', 'note' => 'Come on time', 'taxiDriverId' => 2, 'customerId' => 18, "taxiTypeId" => 1]))->save();
        (new \App\NewOrder(['origin' => 'St. Thomas College', 'originLatitude' => 6.837703, 'originLongitude' => 79.865048, 'destination' => 'Kadawatha', 'destinationLatitude' => 7.002807, 'destinationLongitude' => 79.953426, 'time' => '2016-06-09 09:00:00', 'contact' => '0777146646', 'state' => 'ACCEPTED', 'note' => "Don't be late", 'taxiDriverId' => 4, 'customerId' => 18, "taxiTypeId" => 2]))->save();
        (new \App\NewOrder(['origin' => 'Durdans Hospital', 'originLatitude' => 6.901936, 'originLongitude' => 79.853471, 'destination' => 'Kiribathgoda', 'destinationLatitude' => 6.977359, 'destinationLongitude' => 79.929676, 'time' => '2016-06-10 10:20:00', 'contact' => '0715944191', 'state' => 'NOW', 'note' => "Come on time. Don't be late", 'taxiDriverId' => 5, 'customerId' => 18, "taxiTypeId" => 3]))->save();
        (new \App\NewOrder(['origin' => 'Makola', 'originLatitude' => 6.978450, 'originLongitude' => 79.929705, 'destination' => 'Gampaha', 'destinationLatitude' => 7.091302, 'destinationLongitude' => 79.997378, 'time' => '2016-06-13 06:12:13', 'contact' => '0777123456', 'state' => 'PENDING', 'note' => 'Come on time. I want taxi on time', 'taxiDriverId' => 4, 'customerId' => 18, "taxiTypeId" => 1]))->save();

    }
}

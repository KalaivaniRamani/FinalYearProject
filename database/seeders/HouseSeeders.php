<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class HouseSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach(range(1,15)as $value){
        //     DB::table('houses') -> insert([
        //         'owner_name' => $faker->name,
        //         'owner_id' => $faker->numberBetween($min = 1, $max = 6),
        //         'distance'=> $faker->numberBetween($min = 21, $max = 60),
        //         'location'=> $faker->address,
        //         'rental_price' => $faker->numberBetween($min = 21, $max = 60),
        //         'house_type' => $faker->randomElement(['Single Story','Double Story']),
        //         'house_picture' => $faker->image('public/house_picture',300,300, null, false),
        //     ]);
        // }

             // array of specific reservations to populate database
             $houses = [
                [
                    'owner_name' => 'Thomas David',
                    'owner_id' => 1,
                    'owner_status'=> 'In the progress',
                    'distance' => 7,
                    'location' => 'No. 10, Lorong Alor Ara Dahlia 2, Taman Alor Ara Dahlia, Pekan, Pahang',
                    'rental_price' => '700.00',
                    'house_type'=> 'Single Story',
                    'house_picture' => '1673760408_single4.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Abdul Rahman',
                    'owner_id' => 2,
                    'owner_status'=> 'Approved',
                    'distance' => 14,
                    'location' => 'No.204, Perumahan Dato Shahbandar, 26600 Pekan, Pahang.',
                    'rental_price' => '650.00',
                    'house_type'=> 'Double Story',
                    'house_picture' => '1673760179_double1.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Puan Siti Norimah',
                    'owner_id' => 3,
                    'owner_status'=> 'Approved',
                    'distance' => 18,
                    'location' => 'No.134, Taman Ketapang Mualim, 26600 Pekan, Pahang.',
                    'rental_price' => '1000.00',
                    'house_type'=> 'Double Story',
                    'house_picture' => '1673760237_double2.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Aruldas Arumugam',
                    'owner_id' => 4,
                    'owner_status'=> 'In the progress',
                    'distance' => 25,
                    'location' => 'Lorong Alor Ara Dahlia 2,26600 Pekan, Pahang',
                    'rental_price' => '800.00',
                    'house_type'=> 'Single Story',
                    'house_picture' => '1673760293_single2.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Lim Mei Wei',
                    'owner_id' => 5,
                    'owner_status'=> 'Cancelled',
                    'distance' => 16,
                    'location' => 'No.47, Taman Sepekan Jaya 26600 Pekan, Pahang.',
                    'rental_price' => '1200.00',
                    'house_type'=> 'Double Story',
                    'house_picture' => '1673760361_double3.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Muhammad Daniel',
                    'owner_id' => 6,
                    'owner_status'=> 'Cancelled',
                    'distance' => 38,
                    'location' => 'Lorong Sungai Isap Damai 32 Kuantan, Pahang',
                    'rental_price' => '750.00',
                    'house_type'=> 'Single Story',
                    'house_picture' => '1673760408_single4.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Prem Kumar',
                    'owner_id' => 7,
                    'owner_status'=> 'Approved',
                    'distance' => 12,
                    'location' => 'Jalan Bukit Ubi 3 Kuantan, Pahang',
                    'rental_price' => '1500.00',
                    'house_type'=> 'Double Story',
                    'house_picture' => '1673760455_double6.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Lim Zhang Wei',
                    'owner_id' => 8,
                    'owner_status'=> 'In the progress',
                    'distance' => 20,
                    'location' => 'PT1652 Kampung Pulau Serai, 26600 Pekan, Pahang',
                    'rental_price' => '800.00',
                    'house_type'=> 'Single Story',
                    'house_picture' => '1673760516_single5.png',
                    'booking_status' => 'Vacant'
                ],
                [
                    'owner_name' => 'Puan Nur Anissa',
                    'owner_id' => 9,
                    'owner_status'=> 'Approved',
                    'distance' => 40,
                    'location' => 'L7158 Lorong Tok Sira 13 Kuantan, Pahang',
                    'rental_price' => '1300.00',
                    'house_type'=> 'Double Story',
                    'house_picture' => '1673760570_double3.png',
                    'booking_status' => 'Vacant',
                ],
                [
                    'owner_name' => 'Puan Kamala Devi',
                    'owner_id' => 10,
                    'owner_status'=> 'Cancelled',
                    'distance' => 25,
                    'location' => 'PT1622 Kampung Pulau Serai, 26600 Pekan, Pahang',
                    'rental_price' => '650.00',
                    'house_type'=> 'Single Story',
                    'house_picture' => '1673760626_single4.png',
                    'booking_status' => 'Vacant',
                ]
            ];
    
            foreach ($houses as $house) {
                House::create(array(
                    'owner_name' => $house['owner_name'],
                    'owner_id' => $house['owner_id'],
                    'owner_status' => $house['owner_status'],
                    'distance' => $house['distance'],
                    'location' => $house['location'],
                    'rental_price' => $house['rental_price'],
                    'house_type'  => $house['house_type'],
                    'house_picture'  => $house['house_picture'],
                    'booking_status' => $house['booking_status'],
                ));
            }
    }
}

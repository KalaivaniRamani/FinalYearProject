<?php

namespace Database\Seeders;

use App\Models\Booking;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class BookingSeeders extends Seeder
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
        //     DB::table('bookings') -> insert([
        //         'name' => $faker->name,
        //         'email'=> $faker->numberBetween($min = 21, $max = 60),
        //         'owner_name' => $faker->name,
        //         'location'=> $faker->address,
        //         'booking_date'=> Carbon::createFromTimeStamp($faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp()),
        //     ]);
        // }

        $bookings = [
            [
                'user_id' => '2',
                'house_id' => 1,
                'email' => 'k.kalaivaniramani@gmail.com',
                'booking_date' => '2022-09-19'
               
            ],
            [
                'user_id' => '3',
                'house_id' => 3,
                'email' => 'hasya@gmail.com',
                'booking_date' => '2022-10-06'
            ],
            [
                'user_id' => '4',
                'house_id' => 2,
                'email' => 'aqila@gmail.com',
                'booking_date' => '2022-09-10'
            ],
            [
                'user_id' => '5',
                'house_id' => 6,
                'email' => 'balqis@gmail.com',
                'booking_date' => '2022-09-06'
            ],
            [
                'user_id' => '2',
                'house_id' => 7,
                'email'=> 'k.kalaivaniramani@gmail.com',
                'booking_date' => '2022-09-14'
            ],
            [
                'user_id' => '7',
                'house_id' => 4,
                'email'=> 'teovoonchuan@gmail.com',
                'booking_date' => '2022-09-11'
            ],
            [
                'user_id' => '8',
                'house_id' => 5,
                'email'=> 'hafiz12@gmail.com',
                'booking_date' => '2022-09-14'
            ],
            [
                'user_id' => '9',
                'house_id' => 9,
                'email'=> 'suhaida@gmail.com',
                'booking_date' => '2022-10-18'
            ],
            [
                'user_id' => '10',
                'house_id' => 8,
                'email'=> 'nashirah@gmail.com',
                'booking_date' => '2022-09-04'
            ],
            [
                'user_id' => '11',
                'house_id' => 10,
                'email'=> 'sitha10@gmail.com',
                'booking_date' => '2022-09-02'
            ]
        ];

        foreach ($bookings as $booking) {
            Booking::create(array(
                'user_id' => $booking['user_id'],
                'house_id' => $booking['house_id'],
                'email'  => $booking['email'],
                'booking_date'  => $booking['booking_date'],
            ));
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $faker = Faker::create();
        // foreach(range(1,5)as $value){
        //     DB::table('users') -> insert([
        //         'name' => $faker->name,
        //         'email'=> Str::random(10).'@gmail.com',
        //         'role' => $faker->randomDigitNot(2,3,4,5,6,7,8,9),
        //         'password'=>  Hash::make('password'),
        //     ]);
        // }

        // User::factory()
        //     ->count(5)
        //     ->create();

        $users = [
            [
                'name' => 'Admin',
                'email' => 'adminump@gmail.com',
                'role'=>'1',
                'studentId'=> 'NULL',
                'contactNo' => '011-21957127',
                'picture' => '95071675080974_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Kalaivani Ramani',
                'email' => 'k.kalaivaniramani@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19063',
                'contactNo' => '011-61601650',
                'picture' => '99331673689562_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Nur Hasya Binti Mohd Nordin',
                'email' => 'hasya@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19079',
                'contactNo' => '019-76812831',
                'picture' => '62291673689401_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Nuraqila Binti Rohanan ',
                'email' => 'aqila@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19058',
                'contactNo' => '016-12752490',
                'picture' => '28041673689460_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Nur Balqis Binti Omar',
                'email' => 'balqis@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19094',
                'contactNo' => '016-67210135',
                'picture' => '248501673689506_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Khor Qin Wei,Brenda',
                'email' => 'brenda10@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19069',
                'contactNo' => '019-12038409',
                'picture' => '99331673689562_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Teo Voon Chuan',
                'email' => 'teovoonchuan@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19055',
                'contactNo' => '011-29658139',
                'picture' => '22451675080916_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Muhammad Hafiz Bin Jamsari',
                'email' => 'hafiz12@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19065',
                'contactNo' => '011-82391729',
                'picture' => '255611673689622_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Nursuhaida Binti Suhaimi',
                'email' => 'suhaida@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19033',
                'contactNo' => '011-38198273',
                'picture' => '103011673689648_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Nur Nashirah Binti Mohd Nasir',
                'email' => 'nashirah@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19047',
                'contactNo' => '016-94616282',
                'picture' => '225411673689671_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'SITHA A/P GUNASEGRAN',
                'email' => 'sitha10@gmail.com',
                'role'=>'2',
                'studentId'=> 'CB19046',
                'contactNo' => '019-81395294',
                'picture' => '330171673689693_avatar.png',
                'password' =>  Hash::make('12345678'),
            ],

        ];

        foreach ($users as $user) {
            User::create(array(
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'studentId' => $user['studentId'],
                'contactNo' => $user['contactNo'],
                'picture'  => $user['picture'],
                'password'  => $user['password'],
            ));
        }
    }
}


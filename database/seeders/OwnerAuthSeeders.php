<?php

namespace Database\Seeders;

use App\Models\Ownerauth;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerAuthSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach(range(1,5)as $value){
        //     DB::table('ownerauths') -> insert([
        //         'name' => $faker->name,
        //         'email'=> Str::random(10).'@gmail.com',
        //         'password'=>  Hash::make('password'),
        //     ]);
        // }

        $ownerauths = [
            [
                'name' => 'Thomas David',
                'email' => 'thomas12@gmail.com',
                'contactNo' => '011-59323712',
                'owner_ic' => '1673929537.png',
                'picture' => '22451675080916_avatar.png',
                'status'=> 'In the progress',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Abdul Rahman',
                'email' => 'abdulrahman@gmail.com',
                'contactNo' => '016-23354851',
                'owner_ic' => '1673929537.png',
                'picture' => '95071675080974_avatar.png',
                'status'=> 'Approved',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Puan Siti Norimah',
                'email' => 'sitinorimah@gmail.com',
                'contactNo' => '019-43821431',
                'owner_ic' => '1673929537.png',
                'picture' => '308461673691352_avatar.png',
                'status'=> 'Approved',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Aruldas Arumugam',
                'email' => 'aruldas@gmail.com',
                'contactNo' => '011-32491281',
                'owner_ic' => '1673929537.png',
                'picture' => '95071675080974_avatar.png',
                'status'=> 'In the progress',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Lim Mei Wei',
                'email' => 'meiwei34@gmail.com',
                'contactNo' => '016-32491865',
                'owner_ic' => '1673929537.png',
                'picture' => '182021673691428_avatar.png',
                'status'=> 'Rejected',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Muhammad Daniel',
                'email' => 'daniel34@gmail.com',
                'contactNo' => '019-24923218',
                'owner_ic' => '1673929537.png',
                'picture' => '255611673689622_avatar.png',
                'status'=> 'Rejected',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Prem Kumar',
                'email' => 'prem@gmail.com',
                'contactNo' => '011-48921916',
                'owner_ic' => '1673929537.png',
                'picture' => '320591673691466_avatar.png',
                'status'=> 'Approved',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Lim Zhang Wei',
                'email' => 'zhangwei@gmail.com',
                'contactNo' => '016-41598281',
                'owner_ic' => '1673929537.png',
                'picture' => '182021673691428_avatar.png',
                'status'=> 'In the progress',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Puan Nur Anissa',
                'email' => 'nuranissa@gmail.com',
                'contactNo' => '019-15397258',
                'owner_ic' => '1673929537.png',
                'picture' => '155421673691488_avatar.png',
                'status'=> 'Approved',
                'password' =>  Hash::make('12345678'),
            ],
            [
                'name' => 'Puan Kamala Devi',
                'email' => 'rkamala@gmail.com',
                'contactNo' => '011-56726227',
                'owner_ic' => '1673929537.png',
                'picture' => '155421673691488_avatar.png',
                'status'=> 'Rejected',
                'password' =>  Hash::make('12345678'),
            ]
        ];

        foreach ($ownerauths as $ownerauth) {
            Ownerauth::create(array(
                'name' => $ownerauth['name'],
                'email' => $ownerauth['email'],
                'contactNo' => $ownerauth['contactNo'],
                'owner_ic' => $ownerauth['owner_ic'],
                'picture' => $ownerauth['picture'],
                'status'  => $ownerauth['status'],
                'password'  => $ownerauth['password'],
            ));
        }
    }
}


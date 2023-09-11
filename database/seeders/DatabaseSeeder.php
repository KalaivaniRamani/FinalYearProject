<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
         // Adding an admin user
        //  $user = \App\Models\User::factory()
        //  ->count(1)
        //  ->create([
        //      'email' => 'admin@gmail.com',
        //      'password' => Hash::make('umpadmin'),
        //      'role' => '1',

        //  ]);
         
        // $this->call(BookingSeeders::class);
        $this->call(HouseSeeders::class);
        $this->call(OwnerAuthSeeders::class);
        $this->call(UserSeeders::class);
        $this->call(ImageSeeders::class);

    }
}

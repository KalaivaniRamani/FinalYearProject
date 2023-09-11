<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'image' => '1673760069_2.png',
                'house_id' => 1,
            ],
            [
                'image' => '1673760179_5.png',
                'house_id' => 1,
            ],
            [
                'image' => '1673760179_7.png',
                'house_id' => 1,
            ],
            [
                'image' => '1673760179_2.png',
                'house_id' => 2,
            ],
            [
                'image' => '1673760179_5.png',
                'house_id' => 2,
            ],
            [
                'image' => '1673760179_7.png',
                'house_id' => 2,
            ],
            [
                'image' => '1673760237_3.png',
                'house_id' => 3,
            ],
            [
                'image' => '1673760237_4.png',
                'house_id' => 3,
            ],
            [
                'image' => '1673760237_5.png',
                'house_id' => 3,
            ],
            [
                'image' => '1673760293_1.png',
                'house_id' => 4,
            ],
            [
                'image' => '1673760293_2.png',
                'house_id' => 4,
            ],
            [
                'image' => '1673760293_5.png',
                'house_id' => 4,
            ],
            [
                'image' => '1673760361_4.png',
                'house_id' => 5,
            ],
            [
                'image' =>'1673760361_5.png',
                'house_id' => 5,
            ],
            [
                'image' => '1673760361_7.png',
                'house_id' => 5,
            ],
            [
                'image' => '1673760408_2.png',
                'house_id' => 6,
            ],
            [
                'image' => '1673760408_3.png',
                'house_id' => 6,
            ],
            [
                'image' => '1673760408_4.png',
                'house_id' => 6,
            ],
            [
                'image' => '1673760455_5.png',
                'house_id' => 7,
            ],
            [
                'image' => '1673760455_6.png',
                'house_id' => 7,
            ],
            [
                'image' => '1673760455_7.png',
                'house_id' => 7,
            ],
            [
                'image' => '1673760516_3.png',
                'house_id' => 8,
            ],
            [
                'image' => '1673760516_4.png',
                'house_id' => 8,
            ],
            [
                'image' => '1673760516_5.png',
                'house_id' => 8,
            ],
            [
                'image' => '1673760570_4.png',
                'house_id' => 9,
            ],
            [
                'image' => '1673760570_6.png',
                'house_id' => 9,
            ],
            [
                'image' => '1673760570_7.png',
                'house_id' => 9,
            ],
            [
                'image' => '1673760626_1.png',
                'house_id' => 10,
            ],
            [
                'image' => '1673760626_3.png',
                'house_id' => 10,
            ],
            [
                'image' => '1673760626_4.png',
                'house_id' => 10,
            ],
        ];

        foreach ($images as $image) {
            Image::create(array(
                'image' => $image['image'],
                'house_id' => $image['house_id'],
            ));
        }
    }
}

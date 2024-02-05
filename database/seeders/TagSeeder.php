<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [

            [
                'type' => 'Food'
            ],
            [
                'type' => 'Nature'
            ],
            [
                'type' => 'Economy'
            ],
            [
                'type' => 'Cars'
            ],
            [
                'type' => 'Travel'
            ],
            [
                'type' => 'Animal'
            ],

        ];

        foreach ($tags as $tag) {

            $new_tag = new tag();
            $new_tag->type = $tag['type'];
            $new_tag->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Comicon',
                'date' => '22/11/2001',
                'available_tickets' => true,

            ],
            [
                'name' => 'Fiera Dei Farmer',
                'date' => '23/1/2014',
                'available_tickets' => false,

            ],
            [
                'name' => 'Monza',
                'date' => '23/11/2014',
                'available_tickets' => true,

            ],
            [
                'name' => 'Fiera Salsiccia e friarielli',
                'date' => '23/11/2014',
                'available_tickets' => true,
            ]
        ];
        foreach ($events as $event) {

            $new_event = new event();
            $new_event->name = $event['name'];
            $new_event->date = $event['date'];
            $new_event->available_tickets =  $event['available_tickets'];
            $new_event->save();
        }
    }
}

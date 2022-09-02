<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Location;
use App\Models\Performer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(20)->create();

        Event::factory(30)->create()->each(
            function ($event) use ($users) {
                $event->users()->attach($users->random());
            }
        );
    }
}

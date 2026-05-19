<?php

namespace Database\Seeders;

use App\Models\FoundItem;
use App\Models\SoughtItem;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        /*User::firstOrCreate ([
            'email' => 'guillermoromecu@gmail.com',
            'name' => 'Guillermo Romero Cuevas',
            'password' => Hash::make('password'),
        ]);*/
        User::firstOrCreate ([
            'email' => 'test@example.com',
            'name' => 'Test User',
            'password' => Hash::make('password'),
        ]);
        FoundItem::factory(20)->create();
        SoughtItem::factory(20)->create();
        $founds=FoundItem::all();
        SoughtItem::all()->each(function ($sought) use ($founds) {
            $sought->founditems()->attach(
                $founds->random(rand(min(0,$founds->count()),$founds->count()))->pluck('id')->toArray()
            );
        });
    }
}

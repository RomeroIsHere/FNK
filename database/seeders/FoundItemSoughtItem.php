<?php

namespace Database\Seeders;

use App\Models\FoundItem;
use App\Models\SoughtItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoundItemSoughtItem extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $founds=FoundItem::all();
        SoughtItem::all()->each(function ($sought) use ($founds) {
            $sought->founditems()->attach(
                $founds->random(rand(min(0,$founds->count()),$founds->count()))->pluck('id')->toArray()
            );
        });
    }
}

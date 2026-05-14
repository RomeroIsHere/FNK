<?php

namespace Database\Seeders;

use App\Models\SoughtItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoughtItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoughtItem::factory(10)->create();
    }
}

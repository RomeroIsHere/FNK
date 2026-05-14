<?php

namespace Database\Seeders;

use App\Models\FoundItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoundItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoundItem::factory(10)->create();
    }
}

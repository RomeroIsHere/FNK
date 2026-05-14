<?php

use App\Models\FoundItem;
use App\Models\SoughtItem;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('found_item_sought_item', function (Blueprint $table) {
            $table->foreignIdFor(FoundItem::class);
            $table->foreignIdFor(SoughtItem::class);
            $table->foreign('found_item_id')->references('id')->on('found_items');
            $table->foreign('sought_item_id')->references('id')->on('sought_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_item_sought_item');
    }
};

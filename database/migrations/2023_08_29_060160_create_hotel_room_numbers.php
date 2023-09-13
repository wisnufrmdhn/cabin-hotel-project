<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_room_numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_branch_id')->constrained('hotel_branches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('hotel_room_id')->constrained('hotel_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('room_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_room_numbers');
    }
};

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
        Schema::create('hotel_rooms_reserved', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_detail_id')->constrained('reservations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('hotel_room_number_id')->constrained('hotel_room_numbers');
            $table->integer('total_guest');
            $table->integer('price');
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
        Schema::dropIfExists('reservation_details');
    }
};

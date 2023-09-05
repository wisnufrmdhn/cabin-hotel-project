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
        Schema::create('reservation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('reservation_method_id')->constrained('reservation_methods');
            $table->enum('reservation_day_category', ['Weekday', 'Weekend', 'High Season']);
            $table->foreignId('payment_id')->constrained('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->string('booking_number')->nullable();
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

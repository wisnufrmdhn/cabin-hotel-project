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
        Schema::create('reservations_tmp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_branch_id')->constrained('hotel_branches');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('customer_id')->constrained('customers_tmp')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('reservation_start_date');
            $table->datetime('reservation_end_date');
            $table->enum('status', ['Booking', 'Checkin', 'Checkout', 'Canceled']);
            $table->foreignId('reservation_method_id')->constrained('reservation_methods');
            $table->enum('reservation_day_category', ['Weekday', 'Weekend', 'High Season']);
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
        Schema::dropIfExists('reservations_tmp');
    }
};

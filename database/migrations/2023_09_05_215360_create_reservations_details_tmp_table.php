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
        Schema::create('reservations_details_tmp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_tmp_id')->constrained('reservations_tmp')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('reservation_start_date');
            $table->datetime('reservation_end_date');
            $table->enum('reservation_day_category', ['Weekday', 'Weekend', 'High Season']);
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

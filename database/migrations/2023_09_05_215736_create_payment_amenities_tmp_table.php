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
        Schema::create('payment_amenities_tmp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_branch_id')->constrained('hotel_branches');
            $table->foreignId('amenities_id')->constrained('amenities');
            $table->integer('amount');
            $table->integer('price');
            $table->integer('total_price');  
            $table->enum('breakfast_status', ['None', 'Include', 'Exclude'])->nullable();
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
        Schema::dropIfExists('payment_amenities_tmp');
    }
};

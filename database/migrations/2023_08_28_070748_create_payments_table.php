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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_code');
            $table->integer('discount');
            $table->integer('total_price');
            $table->integer('total_price_amenities')->nullable();
            $table->integer('total_payment')->nullable();
            $table->integer('change')->nullable();
            $table->string('payment_image')->nullable();
            $table->enum('payment_check', ['Valid', 'Invalid', 'Oncheck'])->nullable();
            $table->enum('payment_status', ['Lunas', 'DP', 'Lunas + DP'])->nullable();
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
        Schema::dropIfExists('payments');
    }
};

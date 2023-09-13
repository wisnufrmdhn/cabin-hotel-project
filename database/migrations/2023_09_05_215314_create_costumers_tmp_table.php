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
        Schema::create('customers_tmp', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->enum('customer_identity_type', ['KTP', 'SIM', 'Lainnya'])->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_photo_url')->nullable();
            $table->string('customer_identity_photo_url')->nullable();
            $table->integer('hotel_branch_id')->nullable();
            $table->integer('customer_tmp_id')->nullable();
            $table->integer('reservation_method_id')->nullable();
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
        Schema::dropIfExists('costumers_tmp');
    }
};

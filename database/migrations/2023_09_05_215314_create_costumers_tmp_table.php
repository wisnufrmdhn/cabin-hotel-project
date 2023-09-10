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
            $table->enum('customer_identity_type', ['KTP', 'SIM', 'Lainnya']);
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('customer_photo_url');
            $table->string('customer_identity_photo_url');
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

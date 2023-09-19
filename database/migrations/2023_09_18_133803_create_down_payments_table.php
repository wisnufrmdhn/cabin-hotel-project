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
        Schema::create('down_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('hotel_branch_id')->constrained('hotel_branches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->integer('down_payment');
            $table->foreignId('hotel_room_reserved_id')->constrained('hotel_rooms_reserved');
            $table->enum('status', ['New', 'Claimed']);
            $table->timestamp('claim_date');
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
        Schema::dropIfExists('down_payments');
    }
};

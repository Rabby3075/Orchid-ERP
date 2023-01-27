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
        Schema::create('sale_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('projectInvoice')->nullable();
            $table->string('voucher')->nullable();
            $table->integer('payment_method')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('due')->nullable();
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
        Schema::dropIfExists('sale_vouchers');
    }
};

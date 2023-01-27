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
        Schema::create('purchase_purchase_type', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('purchase_type_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('purchase_type_id')->references('id')->on('purchase_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_purchase_type');
    }
};

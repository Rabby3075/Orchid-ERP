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
        Schema::create('purchase_type_purchase', function (Blueprint $table) {
            $table->unsignedBigInteger('purchase_type_id');
            $table->unsignedBigInteger('purchase_id');
            $table->integer('clientId');
            $table->primary(['purchase_type_id', 'purchase_id']);
            $table->foreign('purchase_type_id')->references('id')->on('purchase_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_type_purchase');
    }
};

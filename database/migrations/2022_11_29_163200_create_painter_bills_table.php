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
        Schema::create('painter_bills', function (Blueprint $table) {
            $table->id();
            $table->text('decorCart')->nullable();
            $table->text('finalCart')->nullable();
            $table->integer('totalAmount')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('grandTotal')->nullable();
            $table->integer('note')->nullable();
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
        Schema::dropIfExists('painter_bills');
    }
};

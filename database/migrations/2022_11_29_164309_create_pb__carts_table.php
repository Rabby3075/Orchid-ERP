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
        Schema::create('pb__carts', function (Blueprint $table) {
            $table->id();
            $table->integer('pbId')->nullable();
            $table->integer('houseAreaTypeId')->nullable();
            $table->text('cartInfo')->nullable();
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
        Schema::dropIfExists('pb__carts');
    }
};

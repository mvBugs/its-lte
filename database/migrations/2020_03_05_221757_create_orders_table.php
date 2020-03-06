<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->integer('driver_id')->nullable();
            $table->string('time');
            $table->string('from_street')->nullable();
            $table->string('from_house')->nullable();
            $table->string('from_entrance')->nullable();
            $table->string('to_street')->nullable();
            $table->string('to_house')->nullable();
            $table->string('to_entrance')->nullable();
            $table->text('comment')->nullable();
            $table->string('status');
            $table->string('city_type');
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
        Schema::dropIfExists('orders');
    }
}

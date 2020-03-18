<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntercityOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intercity_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('city_id_to');
            $table->integer('city_id_from');
//            $table->string('time');
            $table->timestamp('date');
            $table->integer('price');
            $table->string('phone');
            $table->text('comment')->nullable();
            $table->integer('driver_id')->nullable();
            $table->string('status');
            $table->string('user_type');
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
        Schema::dropIfExists('intercity_orders');
    }
}

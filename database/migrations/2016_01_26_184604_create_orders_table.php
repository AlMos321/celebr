<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('type');
            $table->string('room');
            $table->string('time')->nullable();
            $table->string('name')->nullable();
            $table->string('email');
            $table->integer('phone')->nullable();
            $table->string('description')->nullable();
            $table->string('card_number');
            $table->integer('total_summ');
            $table->boolean('agree');
            $table->integer('user_id');
            $table->integer('is_paid');
            $table->longText('str_text');
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
        Schema::drop('orders');
    }
}

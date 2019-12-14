<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('currency_type_id')->unsigned();
            $table->string('title');
            $table->integer('price');
            $table->integer('expireDay');
            $table->timestamps();

            $table->foreign('currency_type_id')->references('id')->on('currency_types')
            ->onUpdated('cascade')->onDelete('cascade');
        });

        Schema::create('plan_user', function (Blueprint $table) {
            $table->bigInteger('plan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->Date('expireTime');
            $table->boolean('expire')->default(1);

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdated('cascade')->onDelete('cascade');

            $table->foreign('plan_id')->references('id')->on('plans')
            ->onUpdated('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
        Schema::dropIfExists('plan_user');

    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forexCategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('forex', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('forex_category_id')->unsigned();
            $table->string('pair');
            $table->integer('startingPrice');
            $table->string('tp');
            $table->string('sl');
            $table->string('buy_sell')->nullable();
            $table->boolean('expire')->default(0);
            $table->boolean('close')->default(0);
            $table->timestamps();


            $table->foreign('forex_category_id')->references('id')->on('forexCategories')
            ->onDelete('cascade')->onUpdated('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forex');
    }
}

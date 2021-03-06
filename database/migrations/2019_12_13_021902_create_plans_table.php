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
            $table->string('type');
            $table->string('title');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->integer('expire_day');
            $table->Text('desc')->nullable();
            $table->timestamps();

        });

        Schema::create('plan_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->bigInteger('plan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string("track_id");
            $table->string("id_pay_unique_id");
            $table->string("card_number");
            $table->string("hashed_card");
            $table->Date('expireTime');
            $table->timestamps();

            
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdated('cascade')->onDelete('cascade');

            $table->foreign('plan_id')->references('id')->on('plans')
            ->onUpdated('cascade')->onDelete('cascade');
        });

        Schema::create('plan_user_expire', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->bigInteger('plan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string("track_id");
            $table->string("id_pay_unique_id");
            $table->string("card_number");
            $table->string("hashed_card");
            $table->Date('expireTime');
            
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
        Schema::dropIfExists('plan_user_expire');


    }
}

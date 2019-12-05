<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBinaryOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binary_option', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pair');
            $table->string('buy_sell')->nullable();
            $table->string('time_expire');
            $table->Date('endTime');
            $table->boolean('close')->default(0);
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
        Schema::dropIfExists('binary_option');
    }
}

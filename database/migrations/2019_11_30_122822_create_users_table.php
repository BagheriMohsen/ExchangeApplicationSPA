<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('persianName',100);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('role_id')->unsigned();
            $table->string('fullName',100);
            $table->string('phoneNumber',100)->unique();
            $table->string('language')->default('fa');
            $table->boolean('freeTime')->default(True);
            $table->string('api_key')->nullable();
            $table->boolean('guide_check')->default(False);
            $table->Date('guide_check_date')->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')
            ->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');

    }
}

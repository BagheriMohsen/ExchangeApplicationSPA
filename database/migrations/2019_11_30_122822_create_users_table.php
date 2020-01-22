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

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullName',100);
            $table->string('phoneNumber',100)->unique();
            $table->string('language')->default('fa');
            $table->boolean('freeTime')->default(True);
            $table->string('api_key')->nullable();
            $table->boolean('guide_check')->default(False);
            $table->Date('guide_check_date')->nullable();
            $table->timestamps();
;
        });



        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('family');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('admins');


    }
}

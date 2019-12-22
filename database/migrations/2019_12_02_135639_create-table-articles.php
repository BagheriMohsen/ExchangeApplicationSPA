<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('subCategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->bigInteger('subCategory_id')->unsigned();
            $table->text('body');
            $table->string('lang')->default('fa');
            $table->timestamps();

            $table->foreign('subCategory_id')->references('id')->on('subCategories')
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('subCategories');
        Schema::dropIfExists('articles');

    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('district_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('address');
            $table->string('phone');
            $table->string('image');
            $table->text('description');
            $table->integer('count_view');
            $table->double('avg_rate',8,2);
            $table->integer('number_rate');
            $table->integer('number_comment');
            $table->integer('approve');
            
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->integer('hotel_id')->unsigned();
            $table->integer('areas'); // diện tích
            $table->string('direction'); // hướng
            $table->string('beds'); // phòng
            $table->integer('price'); // giá
            $table->timestamps();
        });

        Schema::create('utilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hotel_utility', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels');

            $table->integer('utility_id')->unsigned();
            $table->foreign('utility_id')->references('id')->on('utilities');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->double('values',8,2);
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('body');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name');
            $table->integer('email');
            $table->integer('phone');
            $table->string('body');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('image');
            $table->integer('category_id')->unsigned();
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
        Schema::dropIfExists('data');
    }
}

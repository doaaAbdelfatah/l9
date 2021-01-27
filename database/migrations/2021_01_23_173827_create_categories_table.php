<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("url")->nullable();
            // $table->unsignedBigInteger("category_id")->nullable();
            // $table->foreign("category_id")->references("id")->on("categories");
            $table->foreignId("category_id")->nullable()->references("id")->on("categories");
            $table->timestamps();
        });
    }

    /*
    1 electroinics null
    2 mobiles 1
    3 casses 1
    4 foods null
    5 seeds 4
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

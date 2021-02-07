<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryToCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_to_categorys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('main_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });


        Schema::dropIfExists('subcategories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_to_category');
    }
}

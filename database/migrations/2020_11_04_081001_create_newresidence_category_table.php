<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewresidenceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('residence_categories');

        Schema::create('residence_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('residence_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('res_categories')->onDelete('cascade');
            $table->foreign('residence_id')->references('id')->on('residences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residence_categories');
    }
}

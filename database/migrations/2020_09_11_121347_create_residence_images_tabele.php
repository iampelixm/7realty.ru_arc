<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenceImagesTabele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('residence_id');
            $table->string('file');
            $table->string('token')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('order_number')->default(1);
            $table->string('type')->default('residences');
            $table->timestamps();

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
        Schema::dropIfExists('residence_images_tabele');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('items');
        
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->integer('price')->default(0)->nullable();
            $table->boolean('special')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->datetime('added_at')->nullable();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });

        Schema::dropIfExists('object_nedvizhs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}

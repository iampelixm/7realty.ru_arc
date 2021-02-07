<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('longitude', 9, 6)->nullable();
            $table->decimal('latitude', 8, 6)->nullable();
            $table->timestamps();
        });

        DB::insert('insert into cities (id, name) values (?, ?)', [1, 'Москва']);
        DB::insert('insert into cities (id, name) values (?, ?)', [2, 'Сочи']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->float('square', 8, 2)->after('price')->default(0);
            $table->string('adress')->after('name')->nullable();
            $table->unsignedTinyInteger('all_rooms')->after('adress')->default(0);
            $table->unsignedTinyInteger('bed_rooms')->after('all_rooms')->default(0);
            $table->unsignedTinyInteger('bath_rooms')->after('bed_rooms')->default(0);
            $table->decimal('longitude', 9, 6)->after('description')->nullable();
            $table->decimal('latitude', 8, 6)->after('longitude')->nullable();
            $table->boolean('active')->after('latitude')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
}

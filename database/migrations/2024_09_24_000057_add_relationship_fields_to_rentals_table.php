<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRentalsTable extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id', 'driver_fk_10141595')->references('id')->on('drivers');
            $table->unsignedBigInteger('week_id')->nullable();
            $table->foreign('week_id', 'week_fk_10141596')->references('id')->on('weeks');
        });
    }
}

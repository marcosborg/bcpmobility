<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('weekly_rental', 15, 2)->nullable();
            $table->decimal('extra_km', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

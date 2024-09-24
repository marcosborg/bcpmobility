<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('operator_code');
            $table->decimal('net', 15, 2)->nullable();
            $table->decimal('gross', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

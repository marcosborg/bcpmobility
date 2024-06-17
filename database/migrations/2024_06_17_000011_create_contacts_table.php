<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('google')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('call')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

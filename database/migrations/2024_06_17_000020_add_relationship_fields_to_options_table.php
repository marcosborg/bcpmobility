<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id', 'lang_fk_9870745')->references('id')->on('langs');
        });
    }
}

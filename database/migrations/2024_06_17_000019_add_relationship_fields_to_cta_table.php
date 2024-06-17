<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCtaTable extends Migration
{
    public function up()
    {
        Schema::table('cta', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id', 'lang_fk_9870700')->references('id')->on('langs');
        });
    }
}

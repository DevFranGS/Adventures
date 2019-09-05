<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('term');
            $table->string('language',5);
            $table->unsignedBigInteger('translate_id');
            $table->timestamps();
            $table->unique('term', 'unique_term');
            $table->unique('translate_id', 'unique_translate_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionaries');
    }
}

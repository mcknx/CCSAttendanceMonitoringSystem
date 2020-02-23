<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Subj_title') ;
            $table->string('Subj_day') ;
            $table->string('Subj_time') ;
            $table->string('Subj_desc') ;
            $table->string('Subj_units') ;
            $table->string('Subj_room') ;
            $table->string('Subj_yr_sec');
            $table->string('Prof_code');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}

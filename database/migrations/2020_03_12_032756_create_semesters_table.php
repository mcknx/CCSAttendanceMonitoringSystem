<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subj_id');
            // $table->unsignedBigInteger('subj_title');
            $table->string('from_year') ;
            $table->string('to_year') ;
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('subj_id')->references('id')->on('subjects');
            // $table->foreign('subj_title')->references('Subj_title')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
}

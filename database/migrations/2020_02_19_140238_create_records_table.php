<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sem_id');
            $table->date('Rec_dateCreated');
            $table->integer('Rec_noProf') ;
            $table->integer('Rec_noPresent') ;
            $table->integer('Rec_noAbsent') ;
            $table->integer('Rec_noLate') ;
            // $table->timestamps();

            $table->foreign('sem_id')->references('id')->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}

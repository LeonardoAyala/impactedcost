<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->date('date');
            $table->integer('hours')->unsigned();
            $table->text('description')->nullable();

            //Soft deletes
            $table->boolean('active')->default(true);

            //Joins
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->bigInteger('report_id')->unsigned();

            //Constraints
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');

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
        Schema::dropIfExists('days');
    }
}

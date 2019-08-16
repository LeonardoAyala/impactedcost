<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_task', function (Blueprint $table) {
            //$table->bigIncrements('id');

            //Base info
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();

            //Soft deletes
            $table->boolean('active')->default(true);

            //Joins
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('task_id')->unsigned();

            //Constrains
            $table->primary(['project_id', 'task_id']);

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
        Schema::dropIfExists('project_task');
    }
}

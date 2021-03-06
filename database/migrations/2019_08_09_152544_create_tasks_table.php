<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->string('name', 30)->nullable();
            $table->string('description', 100)->nullable();
            $table->boolean('complete')->default(true);

            //Soft deletes
            $table->boolean('active')->default(true);

            //Joins
            $table->bigInteger('set_id')->unsigned()->nullable();
            $table->bigInteger('parent_task_id')->unsigned()->nullable();

            $table->bigInteger('previous_task_id')->unsigned()->nullable();
            $table->bigInteger('next_task_id')->unsigned()->nullable();

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
        Schema::dropIfExists('tasks');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->date('initial_date')->nullable();
            $table->date('final_date')->nullable();

            //Soft delete
            $table->boolean('active')->default(false);

            //Joins
            $table->bigInteger('environment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            //Constrains
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('environment_id')->references('id')->on('environments')->onDelete('cascade');

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
        Schema::dropIfExists('reports');
    }
}

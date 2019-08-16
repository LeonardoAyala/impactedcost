<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->float('amount', 8, 2)->default(0);

            //Soft deletes

            //Joins
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('environment_id')->unsigned();

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
        Schema::dropIfExists('salaries');
    }
}

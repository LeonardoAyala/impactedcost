<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_user', function (Blueprint $table) {
            //$table->bigIncrements('id');

            //Joins
            $table->bigInteger('environment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('administrator')->default(false);

            //Constrains
            $table->primary(['environment_id', 'user_id']);

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
        Schema::dropIfExists('environment_user');
    }
}

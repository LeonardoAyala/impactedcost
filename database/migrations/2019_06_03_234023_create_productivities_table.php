<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productivities', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->float('productivity', 2, 2)->default(0);

            //Joins
            $table->bigInteger('environment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            //Constraints
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
        Schema::dropIfExists('productivities');
    }
}

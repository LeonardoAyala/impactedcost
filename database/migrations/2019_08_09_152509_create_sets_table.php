<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->string('name', 30)->nullable();
            $table->string('description', 100)->nullable();

            //Soft deletes
            $table->boolean('active')->default(true);

            //Joins
            $table->bigInteger('environment_id')->unsigned();

            //Constrains
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
        Schema::dropIfExists('sets');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            //Id
            $table->bigIncrements('id');

            //Base info
            $table->string('title', 30);
            $table->string('description', 30)->nullable();

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
        Schema::dropIfExists('roles');
    }
}

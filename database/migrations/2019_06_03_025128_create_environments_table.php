<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environments', function (Blueprint $table) {
            //ID
            $table->bigIncrements('id');

            //Base info
            $table->string('title');
            $table->mediumText('description');
            $table->string('code');
            $table->string('password');

            //Soft deletes
            $table->boolean('active')->default(false);

            //Joins
            $table->bigInteger('user_id')->unsigned();

            //Constrains
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('environments');

        Schema::enableForeignKeyConstraints();
    }
}

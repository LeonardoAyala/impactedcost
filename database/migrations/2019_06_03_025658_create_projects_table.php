<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('title');
            $table->bigInteger('project_category_id')->unsigned();
            $table->mediumText('description');
            $table->date('initial_date');
            $table->bigInteger('environment_id')->unsigned();
            $table->boolean('complete')->default(false);
            $table->boolean('archived')->default(false);
            $table->float('expected_budget', 8, 2)->default(0);

            $table->timestamps();

            $table->foreign('environment_id')->references('id')->on('environments')->onDelete('cascade');
            $table->foreign('project_category_id')->references('id')->on('project_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

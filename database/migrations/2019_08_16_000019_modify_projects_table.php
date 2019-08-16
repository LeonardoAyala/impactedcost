<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            //Basic info
            $table->string('code', 20)->nullable()->change();
            $table->string('title', 50)->change();
            $table->string('description')->nullable()->change();
            $table->date('initial_date')->nullable()->change();

            //Soft delete
            $table->boolean('active')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

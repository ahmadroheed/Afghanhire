<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_emp_qualification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('experience_year');
            $table->string('degree');
            $table->string('management_experience');
            $table->string('achievement');
            $table->integer('empID');
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
        Schema::dropIfExists('_emp_qualification');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpWorkExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_emp_work_experience', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employer_name');
            $table->string('location');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('job_title');
            $table->string('job_description');
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
        Schema::dropIfExists('_emp_work_experience');
    }
}

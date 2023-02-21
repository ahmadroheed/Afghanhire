<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnhamApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anham_applicants', function (Blueprint $table) {
            $table->bigIncrements('applicants_id');
            $table->string('FirstMiddleNames')->nullable();
            $table->string('LastName')->nullable();
            $table->string('FatherName')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Email')->nullable();
            $table->string('MobilePhone')->nullable();
            $table->string('Passport')->nullable();
            $table->string('dob')->nullable();
            $table->string('old_Tazkira')->nullable();
            $table->string('ETazkira')->nullable();
            $table->string('Badge')->nullable();
            $table->string('USGContract')->nullable();
            $table->string('Subcontractor')->nullable();
            $table->text('JobTitle')->nullable();
            $table->text('JobLocation')->nullable();
            $table->longText('JobDuties')->nullable();
            $table->string('SupvrName')->nullable();
            $table->string('SupvrTitle')->nullable();
            $table->string('SupvrEmailWork')->nullable();
            $table->string('SupvrEmailOther')->nullable();
            $table->string('SupvrPhone')->nullable();
            $table->string('EmpStartDate')->nullable();
            $table->string('EmpEndDate')->nullable();
            $table->longText('EmpEndReason')->nullable();
            $table->string('HRAvailable')->nullable();
            $table->string('HRNumber')->nullable();
            $table->string('SIVCaseNo')->nullable();
            $table->string('Dependents')->nullable();
            $table->longText('Hardships')->nullable();
            $table->text('Threats')->nullable();
            $table->string('HigherEdYears')->nullable();
            $table->string('HigherEdLevel')->nullable();
            $table->text('EngReading')->nullable();
            $table->text('EngWriting')->nullable();
            $table->text('EngListening')->nullable();
            $table->text('EngSpeaking')->nullable();
            $table->longText('SkillsProf')->nullable();
            $table->longText('SkillsIT')->nullable();
            $table->text('tazkira_file')->nullable();
            $table->text('passport_file')->nullable();
            $table->text('work_badge_file')->nullable();
            $table->text('recommendation_file')->nullable();
            $table->text('other_file')->nullable();
            $table->integer('userid')->nullable();
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
        Schema::dropIfExists('anham_applicants');
    }
}

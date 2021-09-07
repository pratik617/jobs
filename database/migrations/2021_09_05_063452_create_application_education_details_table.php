<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id');
            $table->string('examination', 30);
            $table->string('course_name', 191)->nullable();
            $table->string('awarding_body', 191);
            $table->date('passing_year');
            $table->float('percentage');

            $table->timestamps();
            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_education_details');
    }
}

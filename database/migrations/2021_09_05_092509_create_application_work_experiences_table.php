<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id');
            $table->string('company_name', 191);
            $table->string('designation', 191);
            $table->date('experience_from');
            $table->date('experience_to');
            
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
        Schema::dropIfExists('application_work_experiences');
    }
}

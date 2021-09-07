<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id');
            $table->string('name', 191);
            $table->string('mobile_number', 10);
            $table->string('relation', 191);

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
        Schema::dropIfExists('application_references');
    }
}

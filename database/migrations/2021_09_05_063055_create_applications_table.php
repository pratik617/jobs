<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 191);
            $table->string('last_name', 191);
            $table->string('email', 191);
            $table->string('mobile_number', 10);
            $table->string('designation', 191);
            $table->date('date_of_birth');
            $table->string('gender', 30);
            $table->string('marital_staus', 30);
            $table->mediumText('address1');
            $table->mediumText('address2')->nullable();
            $table->string('city', 30);
            $table->string('state', 30);
            $table->string('pincode', 6);
            
            $table->mediumText('languages');
            $table->mediumText('preferred_location');
            $table->string('department', 191);
            $table->tinyInteger('notice_period');
            $table->double('expected_ctc');
            $table->double('current_ctc');
            
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}

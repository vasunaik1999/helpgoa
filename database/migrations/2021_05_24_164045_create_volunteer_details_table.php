<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBiginteger('verified_by')->nullable();
            $table->foreign('verified_by')->references('id')->on('users');
            $table->string('aadhaar_num')->unique();
            $table->json('serviceAreas');
            $table->json('supplyTypes');
            $table->string('note')->nullable();
            $table->string('reason')->nullable();
            $table->string('organization')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('volunteer_details');
    }
}

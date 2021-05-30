<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('bed_types');
            $table->string('location');
            $table->string('contact');
            $table->string('address');
            $table->string('nodal_officer_name')->nullable();
            $table->string('nodal_officer_phone')->nullable();
            $table->longText('location_url');
            $table->unsignedBiginteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');
            $table->string('note')->nullable();
            $table->boolean('verified')->default(0);
            $table->boolean('visibility')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('resource_hospitals');
    }
}

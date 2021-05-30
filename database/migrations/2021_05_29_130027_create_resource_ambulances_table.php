<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceAmbulancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_ambulances', function (Blueprint $table) {
            $table->id(); 
            $table->string('provider');
            $table->string('ambulance_type');
            $table->string('service_location');
            $table->string('contact');
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
        Schema::dropIfExists('resource_ambulances');
    }
}

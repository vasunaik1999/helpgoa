<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceDisinfectServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_disinfect_services', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('contact');
            $table->string('service_location')->nullable();
            $table->string('type')->nullable();
            $table->string('extra_info')->nullable();
            $table->unsignedBiginteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');
            $table->string('note')->nullable();
            $table->boolean('verified')->default(0);
            $table->boolean('visibility')->default(0);
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
        Schema::dropIfExists('resource_disinfect_services');
    }
}

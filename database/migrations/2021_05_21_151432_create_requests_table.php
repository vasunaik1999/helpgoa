<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('phone');
            $table->string('city');
            $table->string('taluka');
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('special_instructions')->nullable();
            $table->dateTime('needed_by');
            $table->json('approached_by')->nullable();
            $table->unsignedBiginteger('vol_id')->nullable();
            $table->foreign('vol_id')->references('id')->on('users');
            $table->string('reqStatus');
            $table->string('urgency_status');
            $table->json('items');
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
        Schema::dropIfExists('requests');
    }
}

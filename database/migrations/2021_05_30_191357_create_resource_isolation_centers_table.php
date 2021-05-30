<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceIsolationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_isolation_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable(); //male//female//kids//old people
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('isPaid')->nullable();
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
        Schema::dropIfExists('resource_isolation_centers');
    }
}

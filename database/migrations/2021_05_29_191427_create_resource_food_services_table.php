<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceFoodServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_food_services', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('food_type'); //veg|nonveg
            $table->string('meal_type')->nullable(); //homecooked|restaurant|tiffinservice
            $table->string('contact')->nullable();
            $table->string('service_area')->nullable();
            $table->string('delivery_to')->nullable();
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
        Schema::dropIfExists('resource_food_services');
    }
}

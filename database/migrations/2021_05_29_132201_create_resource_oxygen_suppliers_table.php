<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceOxygenSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_oxygen_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('contact');
            $table->string('supply_type');
            $table->string('service_location');
            $table->string('supplier_address');
            $table->added_by();
            $table->foreign('added_by')->references('id')->on('users');
            $table->string('note')->nullable();
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('resource_oxygen_suppliers');
    }
}

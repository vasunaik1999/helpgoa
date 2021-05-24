<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('secondaryPhone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('addressLine1')->nullable();
            $table->string('city1')->nullable();
            $table->string('taluka1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->string('city2')->nullable();
            $table->string('taluka2')->nullable();
            $table->boolean('isBanned')->default(0);
            $table->boolean('isCovidPos')->default(0);
            $table->boolean('isCovidPosFamily')->default(0);
            $table->boolean('isCovidSymptoms')->default(0);
            $table->integer('ipAddress')->unsigned()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 120);
            $table->string('fantasy_name', 120)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('cnpj', 14);
            $table->string('state_registration', 14)->nullable();
            $table->string('municipal_registration', 45)->nullable();
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

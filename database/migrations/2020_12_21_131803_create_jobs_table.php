<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60);
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('status_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedBigInteger('job_id')->nullable();
            $table->double('estimated_hours', 5, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->date('start_date')->nullable();
            $table->tinyInteger('done_ratio')->default(0);
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('job_statuses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}

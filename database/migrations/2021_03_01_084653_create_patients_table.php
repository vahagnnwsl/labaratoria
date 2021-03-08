<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('sex')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('birth_day')->nullable();
            $table->dateTime('date_and_time_of_sample_collection')->nullable();
            $table->dateTime('date_and_time_of_result_report')->nullable();
            $table->dateTime('flight_date')->nullable();
            $table->string('flight')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('hash')->nullable()->unique();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('patients');
    }
}

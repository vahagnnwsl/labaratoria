<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatient2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient2s', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('sex')->nullable();
            $table->string('international_doc_num')->nullable();
            $table->string('internal_doc_num')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('citizenship')->nullable();
            $table->date('date_first_component')->nullable();
            $table->date('date_second_component')->nullable();
            $table->string('medical_institution')->nullable();
            $table->string('certificate_number')->nullable();
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
        Schema::dropIfExists('patient2s');

    }
}

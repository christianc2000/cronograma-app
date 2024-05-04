<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->references('id')->on('faculties');
            $table->foreignId('career_id')->references('id')->on('careers');
            $table->string('plan',3);
            $table->foreignId('modality_id')->references('id')->on('modalities');
            $table->foreignId('place_id')->references('id')->on('places');
            $table->string('type',1);
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('year');
            $table->string('period',1);
            $table->string('status',1)->default('A');//A=Activo
          
            // $table->foreignId('methologie_id')->references('id')->on('methologies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('self_assessments');
    }
}

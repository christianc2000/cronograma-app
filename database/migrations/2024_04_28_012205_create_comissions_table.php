<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissions', function (Blueprint $table) {
            $table->id();
            $table->string('description',73);
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('self_assessment_id')->references('id')->on('self_assessments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('c_member_id')->references('id')->on('c_members')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comissions');
    }
}

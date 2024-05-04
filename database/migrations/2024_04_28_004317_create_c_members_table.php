<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_members', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->string('cordinator',1)->default('F');//F=Funcionario
            $table->string('type',1);
            $table->string('nombre');
            $table->string('correo');
            $table->string('celular');
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
        Schema::dropIfExists('c_members');
    }
}

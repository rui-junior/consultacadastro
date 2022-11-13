<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('paciente');
            $table->date('nascimento');
            $table->integer('cpf');
            $table->integer('telefone');
            $table->string('email');
            $table->integer('cep');
            $table->string('rua');
            $table->integer('numero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

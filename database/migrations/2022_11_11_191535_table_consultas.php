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
        Schema::create('table_consultas', function (Blueprint $table) {
            $table->id();
            $table->string('paciente');
            $table->string('medico');
            $table->timestamp('dia');
            $table->string('responsavel');
            $table->integer('cpfresponsavel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_consultas');
    }
};

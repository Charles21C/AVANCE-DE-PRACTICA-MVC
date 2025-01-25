<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */

    public function up()
    {
       Schema::create('patients', function (Blueprint $table) {
            $table->id(); // id de paciente
            $table->string('nombre'); // nombre del paciente
            $table->integer('edad'); // edad del paciente
            $table->string('genero'); // género del paciente
            $table->string('direccion'); // dirección del paciente
            $table->string('telefono'); // teléfono del paciente
            $table->json('historial_medico')->nullable();
            $table->timestamps(); // timestamps para created_at y updated_at
        });
    }

    /**
     * Revertir la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

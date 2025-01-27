<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id(); // ID de la cita
            $table->date('fecha'); // Fecha de la cita
            $table->time('hora'); // Hora de la cita
            $table->string('estado')->default('pendiente'); // Estado: pendiente, realizada, cancelada
            $table->string('especialidad'); // Especialidad médica
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // Médico asignado
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade'); // Paciente asignado
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }


    
};


//ESTE ES EL CAMBIO BORRA
Schema::table('citas', function (Blueprint $table) {
    $table->unsignedBigInteger('doctor_id');
    $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

    $table->unsignedBigInteger('paciente_id');
    $table->foreign('paciente_id')->references('id')->on('patients')->onDelete('cascade');
});

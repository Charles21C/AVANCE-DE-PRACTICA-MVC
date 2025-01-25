<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->json('historial_medico')->nullable()->change(); // Cambiar a JSON
        });
    }
    
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->text('historial_medico')->nullable()->change(); // Revertir a texto si es necesario
        });
    }
    
};

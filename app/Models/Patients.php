<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

   
    protected $table = 'patients'; 

    protected $fillable = [
        'nombre',
        'edad',
        'genero',
        'direccion',
        'telefono',
        'historial_medico',

        
    ];

  

    public $timestamps =false;

    protected $casts = [
        'historial_medico' => 'array',
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(UsuarioDelSistema::class, 'usuario_id');
    }


public function citas()
{
    return $this->hasMany(CitaMedica::class);
}

}

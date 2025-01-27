<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doctor extends Model
{
    use HasFactory;

 
    protected $table = 'doctors'; 

    protected $fillable = [
        'nombre',
        'especialidad',
        'horario_disponible',
    ];


    protected $casts = [
        'horario_disponible' => 'array',
    ];

  

public function citas()
{
    return $this->hasMany(CitaMedica::class);
}



}

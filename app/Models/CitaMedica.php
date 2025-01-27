<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaMedica extends Model
{
    use HasFactory;

    protected $table = 'citas';

    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'especialidad',
        'doctor_id',
        'patient_id',  
    ];

    public function patient()
{
    return $this->belongsTo(Patients::class, 'patient_id');
}


    public function doctor()
{
    return $this->belongsTo(Doctor::class, 'doctor_id');
}

}

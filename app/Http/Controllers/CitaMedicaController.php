<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use App\Models\Doctor;
use App\Models\Patients;  
use Illuminate\Http\Request;

class CitaMedicaController extends Controller
{
    public function index()
    {
        $citas = CitaMedica::with('doctor', 'patient')->get(); 
        return view('cita.index', compact('citas'));
    }

    
    public function create()
    {
        // Obtener todos los doctores y pacientes
        $doctors = Doctor::all();
        $patients = Patients::all();
        
        // Pasar los datos a la vista
        return view('cita.create', compact('doctors', 'patients'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|string|in:pendiente,realizada,cancelada',
            'especialidad' => 'required|string',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        CitaMedica::create($request->all());
        return redirect()->route('cita.index')->with('success', 'Cita médica creada exitosamente.');
    }

    public function show($id)
    {
       $cita = CitaMedica::with('doctor', 'patient')->findOrFail($id);
       return view('cita.show', compact('cita'));
    }  

    public function edit(CitaMedica $cita)
    {
        $doctors = Doctor::all();
        $patients = Patients::all(); 
        return view('cita.edit', compact('cita', 'doctors', 'patients'));
    }

    public function update(Request $request, CitaMedica $cita)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|string|in:pendiente,realizada,cancelada',
            'especialidad' => 'required|string',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $cita->update($request->all());
        return redirect()->route('cita.index')->with('success', 'Cita médica actualizada exitosamente.');
        
    }

    public function destroy(CitaMedica $cita)
    {
        $cita->delete();
        return redirect()->route('cita.index')->with('success', 'Cita médica eliminada exitosamente.');
    }


}

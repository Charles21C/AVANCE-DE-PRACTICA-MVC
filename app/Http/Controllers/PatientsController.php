<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;


class PatientsController extends Controller
{

    public function __construct() {
        $this->middleware('auth:usuarios');
    }

    public function index()
    {
        $patients = Patients::all();
        return view('patients.index', compact('patients'));
    }

    public function dashboard()
    {
        return view('patients.dashboard'); // Vista principal
    }

    /**
     * Mostrar el formulario para crear un nuevo paciente.
     */
    public function create()
    {

        return view('patients.create');
    }

    /**
     * Almacenar un nuevo paciente en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'historial_medico' => 'nullable|array',
        ]);

        Patients::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Mostrar un paciente específico.
     */
    public function show(Patients $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Mostrar el formulario para editar un paciente.
     */
    public function edit(Patients $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Actualizar un paciente en la base de datos.
     */
    public function update(Request $request, Patients $patient)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'historial_medico' => 'nullable|array',
        ]);

        $patient->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'genero' => $request->genero,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'historial_medico' => json_encode($request->historial_medico),]);

 

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Eliminar un paciente de la base de datos.
     */
    public function destroy(Patients $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}

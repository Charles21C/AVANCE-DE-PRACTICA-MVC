<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

*/

Route::get('/', function () {
    return view('home');
})->name('home');

use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CitaMedicaController;
use App\Http\Controllers\UsuarioDelSistemaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdministracionDelSistemaController;

use function PHPSTORM_META\type;

Route::resource('patients', PatientsController::class);
Route::resource('doctor', DoctorController::class);
Route::resource('cita', CitaMedicaController::class);
Route::resource('usuarios', UsuarioDelSistemaController::class);


//PACIENTES
Route::middleware(['auth:usuarios', 'check.user.type:paciente'])->group (function(){
    //Route::middleware(['auth', 'check.user.type:paciente'])->group(function () {

    Route::get('/patients', [PatientsController::class, 'dashboard'])->name('patients.dashboard');
// Ruta para mostrar el formulario de creación de paciente
Route::get('/patients/create', [PatientsController::class, 'create'])->name('patients.create'); 
// Ruta para almacenar un nuevo paciente en la base de datos
Route::post('/patients/store', [PatientsController::class, 'store'])->name('patients.store'); });
// Ruta para mostrar la lista de pacientes
Route::get('/patients', [PatientsController::class, 'index'])->name('patients.index');
// Ruta para ver los detalles de un paciente
Route::get('/patients/{id}', [PatientsController::class, 'show'])->name('patients.show');
// Ruta para actualizar los datos de un paciente
Route::put('/patients/{id}/update', [PatientsController::class, 'update'])->name('patients.update');
// Ruta para mostrar el formulario de edición de un paciente
Route::get('/patients/{id}/edit', [PatientsController::class, 'edit'])->name('patients.edit');


//DOCTOR
// Ruta para mostrar el formulario de creación 
Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
// Ruta para almacenar un nuevo paciente en la base de datos
Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
// Ruta para mostrar la lista 
Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
// Ruta para ver los detalles 
Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
// Ruta para actualizar los datos 
Route::put('/doctor/{id}/update', [DoctorController::class, 'update'])->name('doctor.update');
// Ruta para mostrar el formulario de edición 
Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');

//USUARIO DEL SIGH
// Ruta para mostrar el formulario de creación 
Route::get('/usuarios/create', [UsuarioDelSistemaController::class, 'create'])->name('usuarios.create');
// Ruta para almacenar un nuevo paciente en la base de datos
Route::post('/usuarios/store', [UsuarioDelSistemaController::class, 'store'])->name('usuarios.store');
// Ruta para mostrar la lista 
Route::get('/usuarios', [UsuarioDelSistemaController::class, 'index'])->name('usuarios.index');
// Ruta para actualizar los datos 
Route::put('/usuarios/{id}/update', [UsuarioDelSistemaController::class, 'update'])->name('usuarios.update');
// Ruta para mostrar el formulario de edición 
Route::get('/usuarios/{id}/edit', [UsuarioDelSistemaController::class, 'edit'])->name('usuarios.edit');




//Route::middleware(['auth', 'admin'])->group(function () {
    //Route::middleware(['auth', 'check.user.type:admin'])->group(function () {
        Route::middleware(['auth:usuarios', 'check.user.type:admin'])->group (function(){
    Route::get('/admin', [AdministracionDelSistemaController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/usuarios', [AdministracionDelSistemaController::class, 'gestionarUsuarios'])->name('admin.gestionarUsuarios');
    Route::post('/admin/usuarios', [AdministracionDelSistemaController::class, 'crearUsuario'])->name('admin.crearUsuario');
    Route::get('/admin/reportes', [AdministracionDelSistemaController::class, 'generarReportes'])->name('admin.generarReportes');
});



//LOGIN
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//CITAS
// Ruta para mostrar todas las citas (index)
Route::get('/cita', [CitaMedicaController::class, 'index'])->name('cita.index');

// Ruta para mostrar el formulario de creación de una cita (create)
Route::get('/cita/create', [CitaMedicaController::class, 'create'])->name('cita.create');

// Ruta para almacenar una nueva cita en la base de datos (store)
Route::post('/cita', [CitaMedicaController::class, 'store'])->name('cita.store');

// Ruta para mostrar los detalles de una cita específica (show)
Route::get('/cita/{id}', [CitaMedicaController::class, 'show'])->name('cita.show');

// Ruta para mostrar el formulario de edición de una cita (edit)
Route::get('/cita/{cita}/edit', [CitaMedicaController::class, 'edit'])->name('cita.edit');

// Ruta para actualizar los datos de una cita en la base de datos (update)
Route::put('/cita/{cita}', [CitaMedicaController::class, 'update'])->name('cita.update');

// Ruta para eliminar una cita (destroy)
Route::delete('/cita/{cita}', [CitaMedicaController::class, 'destroy'])->name('cita.destroy');


//disponibilidad DE CITAS

Route::resource('citas', CitaMedicaController::class);
Route::get('/citas/disponibilidad', [CitaMedicaController::class, 'verDisponibilidad'])->name('citas.disponibilidad');


Route::resource('citas', CitaMedicaController::class);
Route::resource('doctor', DoctorController::class);

// Ruta adicional para la disponibilidad de horarios
Route::get('citas/disponibilidad', [CitaMedicaController::class, 'disponibilidad'])->name('citas.disponibilidad');











// Para paciente

/*
// Para médicos
Route::get('/agenda-medica', [DoctorController::class, 'agenda'])->name('medico.agenda');
/*
// Para administrador
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


// Ruta para el login
Route::get('login', [UsuarioController::class, 'showLoginForm'])->name('login');
Route::post('login', [UsuarioController::class, 'login']);

// Ruta para el registro
Route::get('register', [UsuarioController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UsuarioController::class, 'register']);

// Ruta para cerrar sesión
Route::post('logout', [UsuarioController::class, 'logout'])->name('logout');

use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Ruta para mostrar el formulario de login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Ruta para manejar la autenticación (login)
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

*/
/*
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Rutas de login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Ruta de logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');






// Para los doctores (dashboard)
Route::get('/dashboard/doctor', [DoctorController::class, 'index'])->name('dashboard.doctor');


Route::middleware(['auth', 'role:paciente'])->group(function () {
    Route::get('/citas/agendar', [CitaMedicaController::class, 'agendar'])->name('citas.agendar');
});

Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/dashboard/doctor', [DoctorController::class, 'index'])->name('dashboard.doctor');
});

Route::resource('UsuarioDelSistema', AuthenticatedSessionController::class);

*/


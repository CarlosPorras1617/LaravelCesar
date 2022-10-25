<?php
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/usuarios',[UsuarioController::class,'crearUsuario']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'modificarUsuario']);
//para mandar datos en la uri dinamicos no estaticos
Route::delete('/usuarios/{id}',[UsuarioController::class, 'eliminarUsuario']);
Route::get('/usuarios',[UsuarioController::class, 'obtenerUsuarios']);


Route::get('/productos',[ProductoController::class, 'obtenerProductos']);
Route::get('/productos/{id}', [ProductoController::class, 'obtenerProducto']);
Route::post('/productos', [ProductoController::class, 'crearProducto']);

Route::get('/docentes/{matricula}', [DocenteController::class, 'show']);

//examen
Route::get('/estudiantes', [EstudianteController::class, 'mostrarTotalEstudiantes']);


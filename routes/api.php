<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\PermintaanController;
use App\Models\pengguna;

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

Route::post('/login', [PenggunaController::class, 'login']);
Route::post('/register', [PenggunaController::class, 'register']);

// jadwal pemberangkatan
Route::post('/jadwal/create', [PenggunaController::class, 'jadwalcreate']);
Route::delete('/jadwal/delete/{id}', [PenggunaController::class, 'jadwaldelete']);
Route::patch('/jadwal/update/{id}', [PenggunaController::class, 'jadwalupdate']);
Route::get('/jadwal', [PenggunaController::class, 'index']);
Route::get('/jadwal/{id}', [PenggunaController::class, 'jadwalshow']);

//penempatann
Route::post('/penempatan/create', [PenempatanController::class, 'create']);
Route::get('/penempatan', [PenempatanController::class, 'index']);
Route::get('/penempatan/{id}', [PenempatanController::class, 'show']);
Route::patch('/penempatan/update/{id}', [PenempatanController::class, 'update']);
Route::delete('/penempatan/delete/{id}', [PenempatanController::class, 'delete']);

//permintaan
Route::post('/permintaan/create', [PermintaanController::class, 'create']);
Route::get('/permintaan', [PermintaanController::class, 'index']);
Route::get('/permintaan/{id}', [PermintaanController::class, 'show']);
Route::patch('permintaan/update/{id}', [PermintaanController::class, 'update']);
Route::delete('/permintaan/delete/{id}', [PermintaanController::class, 'delete']);
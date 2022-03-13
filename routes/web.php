<?php

use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dapur\DocterController;
use App\Http\Controllers\Dapur\DokPrivateController;
use App\Http\Controllers\Dapur\DokumenUmumController;
use App\Http\Controllers\Dapur\NakesController;
use App\Http\Controllers\Dapur\ProfilController;
use App\Http\Controllers\Dapur\PwController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterDokController;
use App\Http\Controllers\HomeController;
use App\Models\Doku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', function () {
    return view('auth.v_login');
});

Route::resource('profil',ProfilController::class);
Route::resource('pw',PwController::class);



Route::group(['middleware' => ['admin']],function(){
Route::resource('user',UserController::class);
Route::resource('kategori',KategoriController::class);
Route::resource('unit',UnitController::class);
Route::resource('jabatan',JabatanController::class);
Route::resource('doku',DokumenUmumController::class);
Route::get('/filter', [DokumenUmumController::class, 'Filter'])->name('arsip.filter');
Route::get('/detail/{id}', [DokumenUmumController::class, 'Detail'])->name('doku.detail');

});// End Middleware Admin

Route::group(['middleware' => ['dokter']],function(){
Route::resource('docter',DocterController::class);
Route::get('/filterdoc', [DocterController::class, 'FilterDoc'])->name('dokter.filter');
Route::get('/detaildoc/{id}', [DocterController::class, 'DetailDoc'])->name('docter.detail');

});// End Middleware Dokter

Route::group(['middleware' => ['nakes']],function(){
Route::resource('nakes',NakesController::class);

Route::get('/filternakes', [NakesController::class, 'FilterNakes'])->name('nakes.filter');
Route::get('/detailnks/{id}', [NakesController::class, 'DetailNakes'])->name('nakes.detail');
});// End Middleware Nakes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

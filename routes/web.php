<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\suratController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\komentarController;
use App\Http\Controllers\ttdController;
use App\Http\Controllers\emailController;
use App\Models\surat;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\dashboardController@index')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);
Route::get('/dashboard', 'App\Http\Controllers\dashboardController@filter')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/buatsurat', function () {
    return view('Nico.buatsurat');
})->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);

// Route::get('/isisurat', function () {
//     return view('Nico.isisurat');
// });

Route::get('/kirimemail/{id}','App\Http\Controllers\emailController@index');

Route::resource('ttd', ttdController::class)->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);
route::get('/ttd/create/{id}', 'App\Http\Controllers\ttdController@create')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);

Route::get('download/{id_surat}', function($id_surat){
    $surat = surat::find($id_surat);
    $ttd = DB::table('ttds')->where('ttds.id_surat', '=', $id_surat)->first();
    return view('Nico.downloadsurat', compact('surat', 'ttd'));
})->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);

Route::resource('/tambahkomentar', komentarController::class)->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);
route::get('/tambahkomentar/create/{id}', 'App\Http\Controllers\komentarController@create')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);

Route::resource('/reviewsurat', suratController::class)->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);
Route::get('/reviewsurat/create/{id}', 'App\Http\Controllers\suratController@create')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);
Route::get('/reviewsurat', 'App\Http\Controllers\suratController@filter')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);

Route::get('/status', 'App\Http\Controllers\statusController@stat')->middleware(['auth', 'verified', 'checkRole:sekertaris,dekan,rektor,wakil rektor']);
require __DIR__ . '/auth.php';

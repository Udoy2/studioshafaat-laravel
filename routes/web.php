<?php

use Illuminate\Support\Facades\Route;
// frontend controller import
use App\Http\Controllers\frontend\FrontendhomeController;
use App\Http\Controllers\frontend\NutshellController;
use App\Http\Controllers\frontend\CollectiblesController;
use App\Http\Controllers\frontend\ProjectsController;
use App\Http\Controllers\frontend\ConnectController;
// backend controller import 
use App\Http\Controllers\backend\BackendhomeController;
use App\Http\Controllers\backend\BackendprojectsController;
use App\Http\Controllers\backend\BackendnutshellController;
use App\Http\Controllers\backend\BackendconnectController;
use App\Http\Controllers\backend\BackendcollectiblesController;
use App\Http\Controllers\backend\BackenduserController;

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

Route::name('frontend.')->group(function () {
    Route::get('/', [FrontendhomeController::class, 'index'])->name('home');
    Route::get('/nutshell', [NutshellController::class, 'index'])->name('nutshell');
    Route::get('/collectible', [CollectiblesController::class, 'index'])->name('collectibles');
    Route::get('/collectible_gallery_response', [CollectiblesController::class, 'collectible_gallery_response'])->name('collectible_response');
    Route::get('/project', [ProjectsController::class, 'index'])->name('projects');
    Route::get('/project_gallery_response/{id}', [ProjectsController::class, 'project_gallery_response'])->name('project_response');
    Route::get('/connect', [ConnectController::class, 'index'])->name('connect');
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('/', BackenduserController::class)->except(['destroy', 'create', 'edit', 'update']);
    });
    // dashboard route ->
    Route::get(
        '/dashboard',
        [BackendhomeController::class, 'index']
    )->name('dashboard');

    // nutshell
    Route::prefix('nutshell')->name('nutshell.')->group(function () {
        Route::resource('/', BackendnutshellController::class)->except(['destroy', 'create', 'edit', 'update']);
    });
    // connect
    Route::prefix('connect')->name('connect.')->group(function () {
        Route::resource('/', BackendconnectController::class)->except(['destroy', 'create', 'edit', 'update']);
    });
    // collectibles
    Route::prefix('collectibles')->name('collectibles.')->group(function () {
        Route::resource('/', BackendcollectiblesController::class)->except(['destroy', 'create', 'edit', 'update']);
        Route::post('/store_collectible', [BackendcollectiblesController::class, 'store_collectible'])->name('store_collectible');
        Route::get('/{id}/edit', [BackendcollectiblesController::class, 'edit'])->name('edit');
        Route::get('/destroy/{id}', [BackendcollectiblesController::class, 'destroy'])->name('destroy');
        Route::post('/update/{id}', [BackendcollectiblesController::class, 'update'])->name('update');
    });

    // projects
    Route::prefix('/projects')->name('projects.')->group(function () {

        Route::resource('/', BackendprojectsController::class)->except(['destroy', 'create', 'edit', 'update']);
        Route::get('/destroy/{id}', [BackendprojectsController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/edit', [BackendprojectsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BackendprojectsController::class, 'update'])->name('update');
    });
});

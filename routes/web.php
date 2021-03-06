<?php

use App\Http\Controllers\LivewireTestController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\AlpineTestController;
use App\Http\Controllers\EventController;
use Barryvdh\Debugbar\DataCollector\EventCollector;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::prefix('manager')
->middleware('can:manager-higher')->group(function(){
    Route::resource('events', EventController::class);
});
Route::middleware('can:user-higher')->group(function(){
    Route::get('index', function () {
    dd('user');
    });
});


Route::controller(LivewireTestController::class)
->prefix('livewire_test')->name('livewire_test.')->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('register', 'register')->name('register');
});

Route::get('alpine-test/index', [AlpineTestController::class, 'index']);

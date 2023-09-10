<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProjectController;
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

Route::controller(MainController::class)->middleware('auth')->group(function(){
    Route::get('/', 'dashboard');
    Route::post('/upload', 'upload');
});

Route::controller(AuthController::Class)->prefix('auth')->group(function(){
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/logout', 'logout');
    Route::post('/login', 'login');
    Route::post('/change-password', 'change_password');
});

Route::controller(ProjectController::class)->prefix('project')->middleware('auth')->group(function(){
    Route::get('/new', 'showNew');
    Route::get('/all', 'all');
    Route::get('/detail/{id}', 'detail');
    Route::post('/save', 'save');
    Route::post('/proccess/save', 'proccess_save');
    Route::post('/delete', 'delete');
    Route::post('/add-work-time', 'add_work_time');
    Route::post('/extend-work-time', 'extend_work_time');
    Route::post('/task/new', 'add_task');
    Route::post('/task/check', 'check_task');
    Route::post('/task/cancel', 'cancel_task');
    Route::post('/note/new', 'add_note');
    Route::post('/note/remove', 'remove_note');
    Route::post('/complate', 'complate');
});

Route::controller(AccountingController::class)->prefix('accounting')->middleware('auth')->group(function(){
    Route::post('/add-payment', 'add_payment');
    Route::post('/remove-payment', 'remove_payment');
});

Route::controller(CustomerController::class)->prefix('customer')->middleware('auth')->group(function(){
    Route::get('/all', 'all');
    Route::get('/new', 'new');
    Route::post('/save', 'save');
});

Route::controller(OfferController::class)->prefix('offer')->middleware('auth')->group(function(){
    Route::get('/new', 'new');
    Route::post('/save', 'save');
    Route::get('/all', 'all');
    Route::get('/wait', 'wait');
});
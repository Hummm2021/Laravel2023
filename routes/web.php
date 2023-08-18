<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DemandeController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;

USE App\Http\Controllers\User\UserController;
USE App\Http\Controllers\Admin\AdminController;
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

// Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('connexion');
// Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function() {
    Route::middleware('guest:web', 'PreventBackHistory')->group(function() {        
        Route::get('/login', [UserController::class, 'login'] )->name('login');
        Route::get('/register', [UserController::class, 'register'] )->name('register');
        Route::post('/create', [UserController::class, 'create'] )->name('create');
        Route::post('/check', [UserController::class, 'check'] )->name('check');
        // Route::get('/test',[TestController::class, 'test'])->name('test');
    });

    Route::middleware('auth:web', 'PreventBackHistory')->group(function() {
        Route::get('/home', [UserController::class, 'home'] )->name('home');
        Route::post('/logout', [UserController::class, 'logout'] )->name('logout');

        //User
        // Route::get('/profile', [UserController::class, 'profile'] )->name('profile');

        // Intervention Technicien
        Route::get('/intervention', [InterventionController::class, 'intervention'] )->name('intervention');
        Route::post('/post-create-intervention', [InterventionController::class, 'createIntervention'] )->name('post-create-intervention');
        // Route::post('/update-intervention/{id}', [InterventionController::class, 'updateIntervention'] )->name('update-intervention');
        Route::get('/delete-intervention/{id}', [InterventionController::class, 'destroyIntervention'] )->name('delete-intervention');


        //Demande utilisateur
        // Route::get('/create-demande', [DemandeController::class, 'createDemande'] )->name('create-demande');
        // Route::get('/show-demande/{id}', [DemandeController::class, 'showDemande'])->name('show-demande');
        Route::get('/demande', [DemandeController::class, 'index'] )->name('demande');
        Route::post('/post-create-demande', [DemandeController::class, 'create'] )->name('post-create-demande');
        // Route::post('/update-demande/{id}', [DemandeController::class, 'update'] )->name('update-demande');
        Route::get('/delete-demande/{id}', [DemandeController::class, 'destroy'] )->name('delete-demande');

        //Ticket
        Route::get('/create-ticket', [TicketController::class, 'createTicket'] )->name('create-ticket');
        Route::get('/show-ticket/{id}', [TicketController::class, 'showTicket'])->name('show-ticket');
        Route::get('/ticket', [TicketController::class, 'index'] )->name('ticket');
        Route::post('/post-create-ticket', [TicketController::class, 'create'] )->name('post-create-ticket');
        Route::post('/update-ticket/{id}', [TicketController::class, 'update'] )->name('update-ticket');
        Route::get('/delete-ticket/{id}', [TicketController::class, 'destroy'] )->name('delete-ticket');
    });
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [AdminController::class, 'login'] )->name('login');
        Route::post('/check', [AdminController::class, 'check'] )->name('check');
    });
    Route::middleware('auth:admin')->group(function() {
        Route::get('/home', [AdminController::class, 'home'] )->name('home');
        // Route::get('/dashboard', [AdminController::class, 'dashboard'] )->name('dashboard');
        Route::get('/ticket', [AdminController::class, 'ticket'])->name('ticket');
        Route::post('/logout', [AdminController::class, 'logout'] )->name('logout');
    });
});

// Route::prefix('ticket')->name('ticket.')->group(function(){
//     Route::view('/overview', 'overview')->name('overview');
// } );
<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ServiceController;


USE App\Http\Controllers\User\UserController;
USE App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\SousDirectionController;

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
        Route::get('/profile', [UserController::class, 'profile'] )->name('profile');
        // Route::get('/profile/{$id}', [UserController::class, 'profile'] )->name('profile');

        //le middleware qui gère les rôles, CheckRole:user

        // Intervention Technicien
        Route::get('/intervention', [InterventionController::class, 'index'] )->name('intervention');
        Route::get('/mes-intervention', [InterventionController::class, 'mesIntervention'] )->name('mes-intervention');
        Route::post('/post-create-intervention', [InterventionController::class, 'createIntervention'] )->name('post-create-intervention');
        Route::post('/update-intervention/{id}', [InterventionController::class, 'update'] )->name('update-intervention');
        Route::get('/delete-intervention/{id}', [InterventionController::class, 'destroy'] )->name('delete-intervention');


        //Demande utilisateur
        Route::get('/show-demande/{id}', [DemandeController::class, 'show'])->name('show-demande');
        Route::get('/demande', [DemandeController::class, 'index'] )->name('demande');
        Route::post('/post-create-demande', [DemandeController::class, 'create'] )->name('post-create-demande');
        Route::post('/update-demande/{id}', [DemandeController::class, 'update'] )->name('update-demande');
        Route::get('/delete-demande/{id}', [DemandeController::class, 'destroy'] )->name('delete-demande');
        Route::get('/demande-resolues', [DemandeController::class, 'demandeResolues'] )->name('demande-resolues');
        Route::get('/demande-enattente', [DemandeController::class, 'demandeEnattente'] )->name('demande-enattente');
        Route::get('/demande-acceptees', [DemandeController::class, 'demandeAcceptees'] )->name('demande-acceptees');


        //Ticket
        Route::get('/create-ticket', [TicketController::class, 'createTicket'] )->name('create-ticket');
        Route::get('/show-ticket/{id}', [TicketController::class, 'showTicket'])->name('show-ticket');
        Route::get('/ticket', [TicketController::class, 'index'] )->name('ticket');
        Route::post('/post-create-ticket', [TicketController::class, 'create'] )->name('post-create-ticket');
        Route::post('/update-ticket/{id}', [TicketController::class, 'update'] )->name('update-ticket');
        Route::get('/delete-ticket/{id}', [TicketController::class, 'destroy'] )->name('delete-ticket');
    });
});
//

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
        Route::get('/reglages', [AdminController::class, 'index'] )->name('reglages');

        // user
        Route::get('/user', [UserController::class, 'index'] )->name('user');
        Route::post('/create', [UserController::class, 'create'] )->name('create');
        // Route::get('/register', [UserController::class, 'register'] )->name('register');
        Route::get('/show-user', [UserController::class, 'show'])->name('show-user');
        Route::get('/update-user', [UserController::class, 'update'])->name('update-user');
        Route::post('/delete-user', [UserController::class, 'destroy'])->name('delete-user');

        //admin demande
        Route::get('/demande', [DemandeController::class, 'index'] )->name('demande');
        Route::post('/post-create-demande', [DemandeController::class, 'create'] )->name('post-create-demande');
        Route::get('/show-demande/{id}', [DemandeController::class, 'show'] )->name('show-demande');
        Route::post('/update-demande/{id}', [DemandeController::class, 'update'] )->name('update-demande');
        Route::get('/delete-demande/{id}', [DemandeController::class, 'destroy'] )->name('delete-demande');
        Route::get('/demande-resoluees', [DemandeController::class, 'demandeResolues'] )->name('demande-resolues');
        Route::get('/demande-enattente', [DemandeController::class, 'demandeEnattente'] )->name('demande-enattente');
        Route::get('/demande-acceptees', [DemandeController::class, 'demandeAcceptees'] )->name('demande-acceptees');

        // Intervention admin
        Route::get('/intervention', [InterventionController::class, 'index'] )->name('intervention');
        Route::post('/post-create-intervention', [InterventionController::class, 'createIntervention'] )->name('post-create-intervention');
        Route::post('/update-intervention/{id}', [InterventionController::class, 'update'] )->name('update-intervention');
        Route::get('/delete-intervention/{id}', [InterventionController::class, 'destroy'] )->name('delete-intervention');

        // direction
        Route::get('/direction', [DirectionController::class, 'index'] )->name('direction');
        Route::post('/store-direction', [DirectionController::class, 'store'])->name('store-direction');
        Route::get('/show-direction', [DirectionController::class, 'show'])->name('show-direction');
        Route::get('/update-direction', [DirectionController::class, 'update'])->name('update-direction');
        Route::post('/delete-direction', [DirectionController::class, 'destroy'])->name('delete-direction');

        // sous-direction
        Route::get('/sous-direction', [SousDirectionController::class, 'index'] )->name('sous-direction');
        Route::post('/store-sous-direction', [SousDirectionController::class, 'store'])->name('store-sous-direction');
        Route::get('/show-sous-direction', [SousDirectionController::class, 'show'])->name('show-sous-direction');
        Route::get('/update-sous-direction', [SousDirectionController::class, 'update'])->name('update-sous-direction');
        Route::post('/delete-sous-direction', [SousDirectionController::class, 'destroy'])->name('delete-sous-direction');

        // service
        Route::get('/service', [ServiceController::class, 'index'] )->name('service');
        Route::post('/store-service', [ServiceController::class, 'store'])->name('store-service');
        Route::get('/show-service', [ServiceController::class, 'show'])->name('show-service');
        Route::get('/update-service', [ServiceController::class, 'update'])->name('update-service');
        Route::post('/delete-service', [ServiceController::class, 'destroy'])->name('delete-service');
    });
});

// Route::prefix('ticket')->name('ticket.')->group(function(){
//     Route::view('/overview', 'overview')->name('overview');
// } );
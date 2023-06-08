<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GameController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TournamentController;
use App\Http\Controllers\Dashboard\TournamentorganizerController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\JointournamentController;
use App\Http\Controllers\Home\TeamhomeController;
use App\Http\Controllers\Home\TournamenthomeController;
use App\Http\Controllers\OpenTrialController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('pages.home.index');
// });

Auth::routes([
    'verify' => true
]);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tournament-detail/{tournament}', [TournamenthomeController::class, 'detail'])->name('tournament-detail');
Route::get('/tournaments', [TournamenthomeController::class, 'list'])->name('tournaments');

Route::get('/join-tournament/{tournament}', [JointournamentController::class, 'index'])->name('join-tournament');
Route::post('/register-tournament', [JointournamentController::class, 'join'])->name('register-tournament');

Route::get('/teams', [TeamhomeController::class, 'index'])->name('teams');
Route::get('/teams-detail/{team}', [TeamhomeController::class, 'detail'])->name('team-detail');
Route::get('/join-team/{team}', [TeamhomeController::class, 'view'])->name('join-team');
Route::post('/register-team', [TeamhomeController::class, 'join'])->name('register-team');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('pages.dashboard.index');
        })->name('dashboard');

        Route::middleware('role:organizer|admin')->group(function () {
            Route::resources(['tournament' => TournamentController::class]);
        });
        
        Route::middleware('role:player|admin')->group(function () {
            Route::resources(['team' => TeamController::class]);
        });
        
        Route::resources(['game' => GameController::class]);
    });
});

Route::get('/open-trial/{team}', [OpenTrialController::class, 'create'])->name('open-trial');
Route::post('/create-open-trial', [OpenTrialController::class, 'store'])->name('create-open-trial');

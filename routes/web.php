<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

//PUBLIC ROUTES
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');


//AIBOPAY PUBLIC ROUTES
Route::prefix('/aibopay')->group(function() {
    
    Route::view('/', 'aibopay.home')
        ->name('aibopay.home');
});



//ROUTES FOR MAIN DASHBOARD
Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function() {

    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.home');

});


require __DIR__.'/auth.php';

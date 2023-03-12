<?php

use App\Http\Controllers\AibopayAccountController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserKycController;
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
Route::prefix('/dashboard')->middleware(['auth', 'verified', 'account_open'])->group(function() {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('user.unlocked')
        ->name('dashboard.home');
    
    Route::prefix('/exchange-rates')->group(function() {

        Route::get('/', [ExchangeRateController::class, 'index'])
            ->name('exchange.all');
        
        Route::get('/add', [ExchangeRateController::class, 'create'])
            ->name('exchange.add');
        
        Route::post('/add', [ExchangeRateController::class, 'store'])
            ->name('exchange.store');
        
        Route::delete('/remove', [ExchangeRateController::class, 'destroy'])
            ->name('exchange.remove');
    });

    Route::prefix('/currencies')->group(function() {

        Route::get('/', [CurrencyController::class, 'index'])
            ->name('currency.all');
        
        Route::get('/add', [CurrencyController::class, 'create'])
            ->name('currency.add');
        
        Route::post('/add', [CurrencyController::class, 'store'])
            ->name('currency.store');
        
        Route::delete('/remove/{id}', [CurrencyController::class, 'destroy'])
            ->name('currency.remove');
    });

    Route::prefix('/users')->group(function() {

        Route::get('/profile', [UserAccountController::class, 'profile'])
            ->name('user.profile');
        
        Route::get('/show/{id}', [UserAccountController::class, 'edit'])
            ->name('users.show');

        Route::get('/assign-role/{id}', [UserAccountController::class, 'assignRole'])
            ->name('users.add.role');
        
        Route::post('/assign-role/{id}', [UserAccountController::class, 'assignRole'])
            ->name('users.add.role');

        Route::patch('/profile/update', [UserAccountController::class, 'update'])
            ->name('user.update');
        
        Route::patch('/user/status', [UserAccountController::class, 'status'])
            ->name('user.status');

        Route::get('/', [UserAccountController::class, 'index'])
            ->middleware('user.unlocked')
            ->name('users.all');
        
        Route::get('/search', [UserAccountController::class, 'search'])
            ->middleware('user.unlocked')
            ->name('users.search');

        Route::prefix('/kyc')->middleware('user.unlocked')->group(function() {

            Route::get('/', [UserKycController::class, 'index'])
                ->name('kyc.all');
            
            Route::get('/add', [UserKycController::class, 'create'])
                ->name('kyc.add');
            
            Route::post('/add', [UserKycController::class, 'store'])
                ->name('kyc.store');
            
            Route::get('/show/{id}', [UserKycController::class, 'show'])
                ->name('kyc.show');

            Route::delete('/remove/{id}', [UserKycController::class, 'destroy'])
                ->name('kyc.remove');

            Route::patch('/verify/{id}', [UserKycController::class, 'update'])
                ->name('kyc.verify');
        });

        Route::prefix('/roles')->middleware('user.unlocked')->group(function() {

            Route::get('/', [RolesController::class, 'index'])
                ->name('roles.all');
            
            Route::get('/create', [RolesController::class, 'create'])
                ->name('roles.add');
            
            Route::post('/create', [RolesController::class, 'store'])
                ->name('roles.store');
            
            Route::get('/show/{id}', [RolesController::class, 'show'])
                ->name('roles.show');
            
            Route::patch('/update/{id}', [RolesController::class, 'update'])
                ->name('roles.update');
            
            Route::delete('/remove/{id}', [RolesController::class, 'destroy'])
                ->name('roles.remove');
        });
    });

    Route::prefix('/aibopay')->group(function() {

        Route::get('/', [AibopayAccountController::class, 'index'])
            ->name('aibopay.all');
        
        Route::view('/introduction', 'dashboard.aibopay.introduction')
            ->name('aibopay.introduction');
        
        Route::prefix('/dashboard')->group(function() {

            Route::post('/start', [AibopayAccountController::class, 'initAibopay'])
                ->name('aibopay.start');

            Route::middleware('have_aibopay')->group(function() {

                Route::get('/', [DashboardController::class, 'aibopay'])
                    ->name('aibopay.dashboard');

                Route::prefix('/add-money')->group(function() {

                    Route::get('/transfer', [PaymentController::class, 'transfer'])
                        ->name('add-money.transfer');
                    
                    Route::get('/ussd', [PaymentController::class, 'ussd'])
                        ->name('add-money.ussd');

                });
                
            });

        });

    });

});


require __DIR__.'/auth.php';

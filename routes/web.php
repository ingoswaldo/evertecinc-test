<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Routing\Router;
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

Route::group([], function (Router $router) {
    //login routes
    $router->middleware('auth')->group(function (Router $authRouter) {
        $authRouter->get('/dashboard', DashboardController::class)->name('dashboard');
    });

    //guest routes
    $router->group([], function (Router $guestRouter) {
        //welcome
        $guestRouter->get('/', WelcomeController::class);

        //cart routes
        $guestRouter->get('/cart', [CartController::class, 'show'])->name('cart.show');

        //order routes
        $guestRouter->post('/orders', [OrderController::class, 'store'])->name('orders.store');

        //transaction routes
        $guestRouter->post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

        //payment routes
        $guestRouter->get('/payments/response/{order}', [PaymentController::class, 'response'])->name('payments.response');
        $guestRouter->get('/payments/response/{order}/declined', [PaymentController::class, 'declined'])->name('payments.declined');
    });
});

require __DIR__.'/auth.php';

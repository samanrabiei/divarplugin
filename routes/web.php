<?php

use App\Http\Controllers\senmessage;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Appmiddleware;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\TestController;
use App\Http\Controllers\userController;
use App\Http\Controllers\DivarController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminCntroller;
use App\Http\Controllers\KenarOauthController;
use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Admin\CustommerController;
use App\Http\Controllers\Admin\DivarTransactionController;
use App\Http\Controllers\Admin\TestController as AdminTestController;

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

Route::prefix('admin')->name('admin.')->middleware('Modirate')->group(function () {
    Route::get('/dashboard', [AdminCntroller::class, 'index'])->name('dashboard');
});

Route::prefix('customers')->name('customers.')->middleware('Modirate')->group(function () {
    Route::get('/list', [CustommerController::class, 'index'])->name('list');
    Route::get('/show/{customer}', [CustommerController::class, 'show'])->name('show');
});

Route::prefix('transactions')->name('transactions.')->middleware('Modirate')->group(function () {
    Route::get('/', [DivarTransactionController::class, 'index'])->name('index');
    Route::get('/create', [DivarTransactionController::class, 'create'])->name('transactions.create');
    Route::post('/store', [DivarTransactionController::class, 'store'])->name('transactions.store');
});

// test
Route::prefix('test')->name('test.')->group(function () {
    Route::get('/', [AdminTestController::class, 'index'])->name('dashboard');
});


// Authentication

Route::get('/admin/admin', [Authentication::class, 'admin'])->name('admin');
Route::post('/submitlogin', [Authentication::class, 'submitlogin'])->name('formlogin');
Route::get('/logout', [Authentication::class, 'logout'])->name('logout');
Route::get('/password/reset', [Authentication::class, 'resetPassword'])->name('password.reset');
Route::post('/password/resetpost', [Authentication::class, 'resetPasswordpost'])->name('password.resetpost');
Route::get('/password/newpassword/{token}', [Authentication::class, 'NewPassword'])->name('new.password');
Route::post('/password/postnewpassword', [Authentication::class, 'SubmitNewPassword'])->name('SubmitNewPassword');








//divar



Route::get('/', [ServiceController::class, 'VehicleViolation'])->name('divar.index');
Route::get('profile/', [profileController::class, 'profile'])->middleware('auth')->name('profile.profile');
Route::get('profile/wallet', [profileController::class, 'wallet'])->middleware('signed')->name('profile.wallet');
Route::post('profile/wallet/post', [profileController::class, 'wallet'])->name('profile.wallet.post')->middleware('auth');

//servicess
Route::prefix('services')->name('services.')->middleware('auth')->group(function () {
    Route::get('/shahkarinquiry', [ServiceController::class, 'shahkarinquiry'])->name('shahkarinquiry');
    Route::get('/requiest/{transicon}', [ServiceController::class, 'requiest'])->name('shahkarinquiryrequiest');

    Route::get('/VehicleViolation', [ServiceController::class, 'VehicleViolation'])->name('VehicleViolation');
});



//ceckout
Route::get('/checkout/showform/{serviceId}', [CheckoutController::class, 'showForm'])->middleware('auth')->name('checkout.showForm');
Route::get('/checkout/payement', [CheckoutController::class, 'payement'])->middleware('auth')->name('checkout.payement');


Route::get('/invoice', [InvoiceController::class, 'create'])->middleware('auth')->name('invoice.create');
Route::post('/invoice/pay', [InvoiceController::class, 'pay'])->middleware('auth')->name('invoice.pay');
Route::get('/payment/callback', [InvoiceController::class, 'callback'])->middleware('auth')->name('payment.callback');

//OTP
Route::get('/login', [OtpLoginController::class, 'showPhoneForm'])->name('otp.phone.form');
Route::get('/login-phone', [OtpLoginController::class, 'showPhoneForm'])->name('otp.phone.form');
Route::post('/login-phone', [OtpLoginController::class, 'sendOtp'])->name('otp.send');

Route::get('/verify-otp', [OtpLoginController::class, 'showVerifyForm'])->name('otp.verify.form');
Route::post('/verify-otp', [OtpLoginController::class, 'verifyOtp'])->name('otp.verify');

Route::get('/logout', [OtpLoginController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/home', function () {
    return view('home');
})->middleware('auth');


//divar

Route::get('/kenar/login', [KenarOauthController::class, 'redirectToKenar'])->name('kenar.login');
Route::get('/kenar/callback', [KenarOauthController::class, 'handleCallback'])->name('kenar.callback');

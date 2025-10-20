<?php

use App\Http\Controllers\senmessage;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Appmiddleware;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\userController;

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

Route::get('/', [blogcontroller::class, 'index'])->name('blog.index')->middleware(appMiddleware::class);


Route::prefix('blog')->name('blog.')->middleware('auth')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/story', [BlogController::class, 'story'])->name('story');
    Route::get('/{blog}', [BlogController::class, 'show'])->name('show');
    Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
    Route::put('/{blog}', [BlogController::class, 'update'])->name('update');
    Route::delete('/{blog}', [BlogController::class, 'delete'])->name('destroy');
});

Route::get('/category', [categorycontroller::class, 'index'])->name('category.index');
Route::get('/category/create', [categorycontroller::class, 'create'])->name('category.create');
Route::get('/category/{category}/edit', [categorycontroller::class, 'edit'])->name('category.edit');
Route::post('/category/story', [categorycontroller::class, 'story'])->name('category.story');
Route::put('/category/{category}', [categorycontroller::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [categorycontroller::class, 'destroy'])->name('category.destroy');

Route::get('/sendmessage', [senmessage::class, 'index'])->name('senmessage.index');
Route::get('/seesion', [senmessage::class, 'seesion'])->name('senmessage.seesion');
Route::get('/date', [senmessage::class, 'date'])->name('senmessage.date');

//cashe
Route::get('/casheset', [senmessage::class, 'cashe_set'])->name('cashe_set');
Route::get('/cashe_get', [senmessage::class, 'cashe_get'])->name('cashe_get');

// Authentication
Route::get('/signup', [Authentication::class, 'formregister'])->name('formregister');
Route::post('/register', [Authentication::class, 'register'])->name('register');
Route::get('/login', [Authentication::class, 'login'])->name('login');
Route::post('/submitlogin', [Authentication::class, 'submitlogin'])->name('formlogin');
Route::get('/logout', [Authentication::class, 'logout'])->name('logout');
Route::get('/password/reset', [Authentication::class, 'resetPassword'])->name('password.reset');
Route::post('/password/resetpost', [Authentication::class, 'resetPasswordpost'])->name('password.resetpost');
Route::get('/password/newpassword/{token}', [Authentication::class, 'NewPassword'])->name('new.password');
Route::post('/password/postnewpassword', [Authentication::class, 'SubmitNewPassword'])->name('SubmitNewPassword');

Route::get('/payment/send', [PaymentController::class, 'send'])->name('payment.send');
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

Route::get('/test', [TestController::class, 'index'])->name('test.index');
Route::get('/test/quiry', [TestController::class, 'quiry'])->name('test.quiry');
Route::get('/test/eloquent', [TestController::class, 'eloquent'])->name('test.eloquent');
Route::get('/test/insert', [TestController::class, 'eloquent_insert'])->name('test.insert');
Route::get('/test/update', [TestController::class, 'eloquent_update'])->name('test.update');
Route::get('/test/delete', [TestController::class, 'eloquent_delete'])->name('test.delete');
Route::get('/test/ass', [TestController::class, 'MassAssignment'])->name('test.MassAssignment');
Route::get('/test/scope_global', [TestController::class, 'scope_global'])->name('test.scope_global');
Route::get('/test/scope_global', [TestController::class, 'scope_global'])->name('test.scope_global');
Route::get('/test/route_model_binding/{id}', [TestController::class, 'route_model_binding'])->name('test.route_model_binding');

Route::get('/test/blog', [TestController::class, 'post'])->name('test.post');
Route::get('/test/comment', [TestController::class, 'comment'])->name('test.comment');

Route::get('user/', [userController::class, 'index'])->name('user.index');

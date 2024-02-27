<?php

use App\Http\Controllers\Admin\ChangePassController;
use App\Http\Controllers\Admin\userAuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\AdminController;
use App\Http\Controllers\Website\AlumniController;
use App\Http\Controllers\Website\BatchWiseController;
use App\Http\Controllers\Website\DownloadFileController;
use App\Http\Controllers\Website\InvitationController;
use App\Http\Controllers\Website\pdfController;
use App\Http\Controllers\Website\piechartController;
use App\Http\Controllers\Website\VerificationController;
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
//     return view('welcome');
// });
//admin

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // alumni details
    Route::get('/admin/alumni_list', [AdminController::class, 'alumni_list']);
    Route::get('/admin/edit/{slug}', [AdminController::class, 'edit']);
    Route::put('/admin/update/{slug}', [AdminController::class, 'update']);
    Route::post('/alumni/delete', [AdminController::class, 'delete']);
    Route::get('/alumni/trash', [AdminController::class, 'trash']);
    Route::get('/alumni/reset/{slug}', [AdminController::class, 'reset']);
    Route::get('/alumni/trx-Report', [AdminController::class, 'trx_report']);
    // alumni details

    // user section
    Route::get('/user/index', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::get('/user/edit/{slug}', [UserController::class, 'edit']);
    Route::put('/user/update/{slug}', [UserController::class, 'update']);
    Route::post('/user/delete', [UserController::class, 'delete']);
    // user secction
    //download all 
    Route::get('/admin/downlaodFile', [AdminController::class, 'download_list']);
    // download all 
});

Route::middleware(['auth', 'IsAdminOrSubAdmin'])->group(function () {

    //    payment verification 
    Route::post('/update-verification-status/{id}', [AdminController::class, 'updateVerificationStatus'])->name('updateVerificationStatus');
    Route::get('/admin/payment_verification', [AdminController::class, 'payment_verification']);
    // payment verification

    // id card generate 
    Route::get('/pdf_gen', [pdfController::class, 'pdf_gen']);
    // id card generate 





});

Route::middleware(['auth', 'isUser'])->group(function () {
    // batch
    Route::get('/admin/batch-search', [AdminController::class, 'batch_search']);
    Route::post('/admin/batch_search_in', [AdminController::class, 'batch_search_in']);
    Route::get('/admin/batch-id-card', [AdminController::class, 'batch_id_search']);
    Route::post('/admin/batch-id-card-gen', [AdminController::class, 'batch_id_search_gen']);
    //batch
});

Route::middleware(['auth', 'IsAdminOrSubAdminOrisUserMiddleware'])->group(function () {

    // batch
    Route::get('/admin/batch-search', [AdminController::class, 'batch_search']);
    Route::post('/admin/batch_search_in', [AdminController::class, 'batch_search_in']);
    Route::get('/admin/batch-id-card', [AdminController::class, 'batch_id_search']);
    Route::post('/admin/batch-id-card-gen', [AdminController::class, 'batch_id_search_gen']);
    //batch
    Route::get('/admin', [AdminController::class, 'index']);

    // change Password
    Route::get('/change/password', [ChangePassController::class, 'edit'])->name('password.edit');
    Route::put('/change/pass/up/{slug}', [ChangePassController::class, 'update']);
    // change Password

    //update user profile 
    Route::get('/user/edit', [AdminController::class, 'user_edit']);
    Route::put('/user/update/{slug}', [AdminController::class, 'user_update']);
    //update user profile 
});



//website
Route::get('/', [AlumniController::class, 'create']);
Route::post('/web/store', [AlumniController::class, 'store']);
Route::get('/web/invitation', [AlumniController::class, 'invitation']);
Route::get('/web/search', [AlumniController::class, 'search'])->name('search');
Route::get('/web/search/pdf/{slug}', [AlumniController::class, 'pdf_inv_gen']);

//auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

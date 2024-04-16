<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\VoteController ;
use App\Http\Controllers\votetimerController ;


use App\Http\Controllers\historiqueController ;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController ;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//user registration
Route::post('/register',[AuthController::class, 'register'] );
Route::post('/login',[AuthController::class, 'login'] );
// admin registration *only for testing
Route::post('/login_admin',[AuthController::class, 'login_admin'] );
Route::post('/register_admin',[AuthController::class, 'register_admin'] );

// user functions
Route::group(['middleware' => ['auth:sanctum']], function() {
   // Define user routes here...
   Route::post('/logout',[AuthController::class, 'logout'] );
   Route::post('/result', [ResultController::class, 'create']); 
   Route::get('/result', [ResultController::class, 'voting']);
   Route::get('/user/{id}',[AuthController::class, 'getUserProfile'] );


});
//admin functions
Route::middleware(['auth:sanctum', 'auth.admin'])->group(function () {
    // Define admin routes here...
    //logout
    Route::post('/logout_admin',[AuthController::class, 'logout_admin'] );
    // user controller
Route::get('/users',[UserController::class, 'index'] );
Route::get('/users/{id}',[UserController::class, 'show'] );
Route::post('/users/create',[UserController::class, 'store'] );
Route::put('/users/update/{id}',[UserController::class, 'update'] );
Route::delete('/users/delete/{id}',[UserController::class, 'destroy'] );
});

Route::get('email/verify/{id}', [VerificationApiController::class, 'verify'])->name('verificationapi.verify');
Route::get('email/resend', [VerificationApiController::class, 'resend'])->name('verificationapi.resend');

Route::post('/vote',[VoteController::class,'create']) ;
Route::delete('/vote/{Vote}/delete',[VoteController::class,'delete']) ;
Route::put('/vote/{Vote}/update',[VoteController::class,'update']) ;
Route::get('/votetimer',[votetimercontroller::class,'votetimer']) ;
Route::get('/votetimer/livevote', [votetimercontroller::class, 'livestats']);
Route::post('/votetimer/deactivatevote', [votetimercontroller::class, 'deactivateVote']);
//Result

Route::get('/historique', [historiquecontroller::class, 'stats']); //stats about the vote history
Route::post('/historique/search', [historiquecontroller::class, 'search']); //search 
//password reset
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);
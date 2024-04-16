<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\VoteController ;
use App\Http\Controllers\votetimerController ;

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

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/sign_in', function () {
    return view('sign_in');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/users', [UserController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});
//REsult
Route::get('/result', [ResultController::class, 'index']);
Route::post('/result/{id}', [ResultController::class, 'create']); 
Route::get('/admin',[AdminController::class,'index']) ;
Route::get('/vote',[VoteController::class,'index']) ;
Route::post('/vote',[VoteController::class,'create']) ;
Route::get('/vote/{Vote}/delete',[VoteController::class,'delete']) ;
Route::post('/vote/{Vote}/update',[VoteController::class,'update']) ;
Route::get('/votetimer',[votetimercontroller::class,'votetimer']) ;
Route::get('/votetimer/livevote', [votetimercontroller::class, 'livevote']);
Route::post('/votetimer/deactivatevote', [votetimercontroller::class, 'deactivateVote']);
//Result
Route::get('/result/{id}', [ResultController::class, 'voting']);

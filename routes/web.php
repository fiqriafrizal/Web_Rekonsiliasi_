<?php


use App\Models\User;
use App\Models\Rekonsiliasi2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RekonsiliasiController;
use App\Http\Controllers\Rekonsiliasi2Controller;

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



// Route untuk melakukan login // --------------------------------------- //
Route::group(['middleware'=>'auth'], function(){    
    Route::get('/home', [MenuController::class,'information']);
    Route::get('/logout', [MenuController::class,'logout']);
    Route::get('/rekonsiliasi',[RekonsiliasiController::class,'index']);
    Route::get('/1', [StepController::class,'stepOne']);
    Route::get('/2', [StepController::class,'stepTwo']);
    Route::post('/2/post', [StepController::class,'stepTwoPost']);
    Route::get('/3', [StepController::class,'stepThree']);
    Route::post('/3/post', [StepController::class,'stepThreePost']);
    Route::get('/4', [StepController::class,'stepFour']);
    Route::post('/4/post', [StepController::class,'stepFourPost']);
    Route::get('/5', [StepController::class,'stepFive']);
    Route::get('/6', [stepController::class,'stepSix']);
    Route::get('/download', [StepController::class,'download']);
    Route::get('/informasi', function () {
        return view('informasi');
    });
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/', [LoginController::class,'index'])->name('login');
    Route::post('/process', [LoginController::class,'login']);
});

Route::get('/register', [LoginController::class,'register']);
Route::post('/post', [LoginController::class,'registerProcess']);














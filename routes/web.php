<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ListController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    
    
});


Route::controller(ListController::class)->group(function(){
        Route::get('/MunkalapListazas', 'lista')->name('lista');
        Route::post('/MunkalapListazas', 'lista')->name('lista');
        Route::get('/munkalapModositas', 'modosit')->name('modosit');
        Route::get('/munkalapFelvetel', 'felvetel')->name('felvetel');
        Route::post('/munkalapFelvetel', 'hozzaadas')->name('hozzaadas');
        Route::post('/munkalapModositas', 'frissites')->name('frissites');
        Route::get('/MunkaListazas', 'worklist')->name('worklist');
        Route::get('/munkalapBovites', 'bovito')->name('bovito');
        Route::get('/Bovit', 'bovit')->name('bovit');
        Route::post('/Bovit', 'adas')->name('adas');
        Route::get('/munkalapMegtekintes', 'megtekint')->name('megtekint');
});

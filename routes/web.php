<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

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

Route::get("/home", "App\Http\Controllers\HomeController@home")->name("home");

Route::get("/signup", "App\Http\Controllers\SignupController@signup")->name("signup");
Route::post("/signup","App\Http\Controllers\SignupController@carica");
Route::post("/controlloUsername","App\Http\Controllers\SignupController@controlloUsername")->name("controlloUsername");

Route::get("/login", "App\Http\Controllers\LoginController@login")->name("login");
Route::post("/login", "App\Http\Controllers\LoginController@checkLogin");
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->name("logout");

Route::get("/veicoli","App\Http\Controllers\VeicoliController@index")->name('veicoli');
Route::get("/ricerca/{text?}","App\Http\Controllers\VeicoliController@ricerca")->name('ricerca');
Route::post("/aggiungi","App\Http\Controllers\VeicoliController@aggiungi")->name('aggiungi');
Route::post("/rimuovi","App\Http\Controllers\VeicoliController@rimuovi")->name('rimuovi');
Route::get("/pref","App\Http\Controllers\VeicoliController@veicoliPreferiti")->name('pref');
Route::get("/cont","App\Http\Controllers\VeicoliController@cont")->name('cont');
Route::post("/newC","App\Http\Controllers\VeicoliController@newC")->name('newC');
Route::post("/remC","App\Http\Controllers\VeicoliController@remC")->name('remC');


Route::get("/news/{q?}","App\Http\Controllers\VeicoliController@news")->name('news');
Route::get("/maps","App\Http\Controllers\HomeController@maps")->name('maps');
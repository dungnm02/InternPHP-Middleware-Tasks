<?php

use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckRole;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adultonly', function () {
    return view ('adultonly');
})->middleware(CheckAge::class);

Route::get('/notadultyet', function() {
    return view ('notadultyet');
});

Route::get('/rolenotallowed', function() {
    return view('rolenotallowed');
});

Route::get('/ceo', function() {
    return view('roleallowed');
})-> middleware(CheckRole::class.":ceo");

Route::get('/dev', function() {
    return view('roleallowed');
})-> middleware(CheckRole::class.':dev');

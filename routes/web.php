<?php

use App\Mail\Correo;
use App\Mail\Forms;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [\App\Http\Controllers\Controller::class,'index']);

//Route::POST('/enviarInfo', [\App\Http\Controllers\Controller::class,'enviarInfo'])->name('correo');

Route::POST('email', function () {
    Mail::to("contacto@sofamima.com")->send(new Correo(request()->name, request()->email, request()->celular, request()->mensaje));
    return view('index');
})->name('email');

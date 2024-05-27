<?php

use App\Http\Controllers\IMCController;
use App\Models\People;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/saiba-mais', function () {
    return view('saiba-mais');})->name('saiba-mais');

Route::get('/sobre-nos', function () {
    return view('sobre-nos');})->name('sobre-nos');    

Route::get('/mais-voce', function () {
    $peoples = People::all();

    return view('mais-voce', compact('peoples'));})->name('mais-voce');    


Route::post('/calcular-imc-massa', [IMCController::class, 'calcularIMCemMassa']);
Route::post('/mais-voce', [IMCController::class, 'organizar']);



<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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

Route::namespace('\App\Http\Controllers')->group(function () {
    Route::get('/series', 'SeriesController@index')
        ->name('listar_series');
    Route::get('/series/criar', 'SeriesController@create')
        ->name('form_criar_serie')
        ->middleware('autenticador');
    Route::post('/series/criar', 'SeriesController@store')
        ->middleware('autenticador');
    Route::delete('/series/{id}', 'SeriesController@destroy')
        ->middleware('autenticador');
    Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')
        ->middleware('autenticador');

    Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

    Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

    Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
        ->middleware('autenticador');
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/entrar', 'EntrarController@index');
    Route::post('/entrar', 'EntrarController@entrar');
    Route::get('/registrar', 'RegistroController@create');
    Route::post('/registrar', 'RegistroController@store');
});

Route::get('/sair', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/visualizando-email', function () {

    $email = new \App\Mail\NovaSerie('Arrow', 3, 2);
    $user = (object) [
        'email' => 'renato.t.vieira@caixa.gov.br',
        'from' => 'renato.t.vieira@caixa.gov.br',
        'name' => 'Renato T P Vieira'
    ];
    Mail::to($user)->send($email);
    return 'Enviado';
});

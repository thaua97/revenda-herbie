<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'auth'], function() {
   Route::get('/', function() { return view('admin.index'); });
   Route::get('carrodestaque/{id}', 'CarroController@destaque')->name('carros.destaque');
   Route::get('propdestaque/{id}', 'PropostasController@destaque')->name('propostas.destaque');
   Route::get('carrosgraf', 'CarroController@graf')->name('carros.graf');
   Route::resource('propostas', 'PropostasController');
   Route::resource('carros', 'CarroController');
   Route::resource('usuarios', 'UserController');
   
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('site', 'PubCarroController');
Route::resource('proposta', 'PropostasController');

Route::get('/wscarro/{id?}', 'wsController@wsCarro');

Route::get('/wsxml/{id?}', 'wsController@wsxml');

Route::get('/listaxml/{preco?}', 'wsController@listaxml');

Route::get('/rel', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

Route::get('relcarros', 'relatController@relcarros');

Route::post('carrossearch', 'PubCarroController@search')->name('carros.search');


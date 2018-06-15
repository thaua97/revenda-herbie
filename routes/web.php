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
Route::resource('cadproposta', 'PropostasController');

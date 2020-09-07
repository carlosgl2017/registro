<?php

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
Route::group(['middleware'=>['guest']],function(){
Auth::routes();
});



Route::group(['middleware'=>['auth']],function(){

      Route::post('/logout','Auth\loginController@logout')->name('logout');

      /*--------Rutas Nacionalidad--------*/
      Route::get('/nacionalidad/selectNacionalidad', 'NacionalidadController@selectNacionalidad');
      /*--------Rutas Extension-----------*/
      Route::get('/extension/selectExtension', 'ExtensionController@selectExtension');
      /*--------Rutas Estado Civil-----------*/
      Route::get('/estadocivil/selectEstadoCivil', 'EstadoCivilController@selectEstadoCivil');
      /*--------Rutas salario-----------*/
      Route::get('/tipo-salario/selectTipoSalario', 'TipoSalarioController@selectTipoSalario');
      /*--------Rutas ingreso-----------*/
      Route::get('/tipo-salario/selectTipoSalario', 'TipoSalarioController@selectTipoSalario');
     /*--------Rutas ingreso-----------*/
       Route::get('/tipo-ingreso/selectTipoIngreso', 'TipoIngresoController@selectTipoIngreso');
    /*--------Rutas ingreso-----------*/
      Route::get('/destino/selectDestino', 'DestinoCreditoController@selectDestino');
      /*--------Rutas -----------*/
      Route::get('/entidad/selectEntidad', 'EntidadFinancieraController@selectEntidad');
      /*--------Rutas -----------*/
      Route::get('/tipo-bien/selectTipoBien', 'TipoBienController@selectTipoBien');
       /*--------Rutas -----------*/
       Route::get('/tipo-credito/selectTipoCredito', 'TipoCreditoController@selectTipoCredito');




      
    Route::get('/bien', 'BienController@index');
    Route::post('/bien/registrar', 'BienController@store');
    Route::get('/bien/enviar', 'BienController@enviar');
    Route::put('/bien/actualizar', 'BienController@update');
    
    Route::get('/persona', 'PersonaController@index');
    Route::post('/persona/registrar', 'PersonaController@store');
    Route::put('/persona/actualizar', 'PersonaController@update');

    Route::get('/prestamo', 'PrestamoController@index');
    Route::post('/prestamo/registrar', 'PrestamoController@store');
    Route::put('/prestamo/actualizar', 'PrestamoController@update');

    Route::get('/conyugue', 'ConyugueController@index');
    Route::post('/conyugue/registrar', 'ConyugueController@store');
    Route::put('/conyugue/actualizar', 'ConyugueController@update');
    
    
    Route::get('/ingreso', 'IngresoController@index');
    Route::post('/ingreso/registrar', 'IngresoController@store');
    Route::put('/ingreso/actualizar', 'IngresoController@update');
    
    Route::get('/credito', 'CreditoController@index');
    Route::post('/credito/registrar', 'CreditoController@store');
    Route::put('/credito/actualizar', 'CreditoController@update');


    Route::get('/enviar/email', 'CalificarConsumo@enviar');
    Route::group(['middleware'=>['Usuario']],function(){
      
    });


    Route::get('/', function () {
        return view('contenido/contenido');
    });
    Route::get('/rol','RolController@index');
    Route::post('/rol/registrar','RolController@store');
    Route::put('/rol/actualizar','RolController@update');
    Route::put('/rol/desactivar','RolController@desactivar');
    Route::put('/rol/activar','RolController@activar'); 
    
            
});



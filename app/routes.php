<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('session/login', ['as' => 'login', 'uses' => 'SesionesController@getLogin']);
Route::get('prof/departamento/perfil', ['as' => 'perfil', 'uses' => 'ProfesoresController@getPerfil']);

Route::post('session/login', ['uses' => 'SesionesController@postLogin']);
Route::get('session/logout', ['as' => 'logout', 'uses' => 'SesionesController@getLogout']);

Route::group(['prefix' => '/', 'before' => 'auth|admin'], function() {


Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);


/*
	Route::group(['prefix' => 'view'], function() {
		Route::get('home', 'HomeController@getHome');
		Route::controller('acciones', 'AccionesViewController');
		Route::controller('metas', 'MetasViewController');
	});
*/
	
	Route::post('agregar-poa', ['filter' => 'csrf', 'uses' => 'HomeController@postPoa']);
	Route::post('agregar-hoja', ['filter' => 'csrf', 'uses' => 'HomeController@postAgregarHoja']);
	Route::post('agregar-usuario', ['filter' => 'csrf', 'uses' => 'UsuariosController@postAgregarUsuario']);
	Route::post('agregar-accion', ['filter' => 'csrf', 'uses' => 'HomeController@postAgregarAccion']);

	
	Route::group(['prefix' => 'api'], function() {
		Route::controller('acciones', 'AccionesApiController');
		Route::get('responsablesUsuarios', 'RespUsuariosApiController@getUsuarios');
		Route::get('metas/{id}', 'MetasApiController@getIndex');
		Route::get('metas/{id}/hojas', 'MetasApiController@getHojas');
		Route::get('metas/departamentos/{id}', 'MetasApiController@getDepartamentos');
		Route::get('metas/{id}/hojas.html', 'MetasApiController@getHojasHtml');
		Route::get('metas/{id}/hojas2.html', 'MetasApiController@getHojasHtml2');
		Route::get('hoja/departamentos/{id}', 'HojasApiController@getDepartamentos');
		Route::get('departamento/{id}', 'DepartamentoApiController@getDepartamento');
		Route::get('departamento/meta/{id}', 'DepartamentoApiController@getMetas');
		Route::get('departamento/{id}', 'ResponsablesApiController@getResposables');
		Route::get('responsable/{id}', 'ResponsablesApiController@getResposable');
		Route::get('respUsuario/{id}', 'RespUsuariosApiController@getResUsuario');
		Route::get('hoja/descripcion/{id}', 'HojasApiController@getHojaDesc');
		Route::get('usuarios', ['as' => 'responsables.user', 'uses' => 'UsuariosController@getIndex']);

		Route::get('accion/descripcion/{id}', 'accionesApiController@getAccionDesc');
		Route::get('ProfesorDepartamentos/{ida}', 'ProfesoresController@getResposableDepartamentos');

	});

	Route::resource('metas', 'MetasController');

	Route::resource('responsables', 'ResponsablesController');

	Route::resource('partidas', 'PartidasController');

	Route::resource('ejercicios', 'EjerciciosController');

	Route::resource('acciones', 'AccionesController');
	
	Route::resource('departamentos', 'DepartamentosController');


});

Route::post('agregar-general', ['filter' => 'csrf', 'uses' => 'ProfesoresController@postGeneral']);
Route::group(['prefix' => 'prof', 'before' => 'auth'], function() {
	Route::group(['prefix' => 'departamento'], function(){
		
		Route::get('/', ['as' => 'prof.home', 'uses' => 'ProfesoresController@postIndex']);

		//Route::get('nuevo', 'ProfesoresCgetRespoDeptos/{id}ontroller@getIndex');
		Route::get('perfil', 'ProfesoresController@getPerfil');
		Route::get('ProfesorDepartamentos/{ida}', 'ProfesoresController@getResposableDepartamentos');
		Route::get('deptosHojas/{iddpto}', 'DepartamentoApiController@getHojas');
		Route::get('deptoMetas/{iddpto}', 'DepartamentoApiController@getHojas');
		Route::get('hoja/{id}', 'HojasApiController@getHojaDesc');
		Route::get('partida/{partida}', 'PartidasApiController@getDescPartida');
		Route::get('partidaDesc/{id}', 'ProfesoresController@getPartidaDesc');
		Route::get('hoja/meta/{idm}', 'ProfesoresController@getHojaMeta');
		Route::get('hoja/acciones/{idh}/{idd}', 'ProfesoresController@getHojaAcciones');
		Route::get('hoja/DescAccion/{ida}', 'ProfesoresController@getDescAccion');
		Route::get('/hoja/partidas/{idd}/{idh}/{idm}', 'ProfesoresController@getDtoHM');
		Route::get('/requisicion', ['as' => 'requisicion', 'uses' => 'ProfesoresController@getRequisicion']);
		Route::get('/eliminarRequisicion', ['as' => 'eliminarRequisicion', 'uses' => 'ProfesoresController@getEliminarRequisicion']);
		
		Route::post('modificar-usuarioss', ['filter' => 'csrf', 'uses' => 'ProfesoresController@postUsuario']);
	});
});


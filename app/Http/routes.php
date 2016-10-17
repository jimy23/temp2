<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('auth/register/{codigoInstitucion}', 'Auth\AuthController@getGrupos');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('home','DashboardController@index');

Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function(){
	//Route::resource('profile','ProfileController');
	Route::resource('users','UsuarioController');
	Route::get('users/{id}/destroy',[
			'uses'=>'UsuarioController@destroy',
			'as'=>'admin.users.destroy'
		]);
    Route::get('users/create/{institucion_codigoInstitucion}', 'UsuarioController@getGrupos');
	Route::resource('institutions','InstitucionController');
	Route::get('institutions/{id}/destroy',[
			'uses'=>'InstitucionController@destroy',
			'as'=>'admin.institutions.destroy'
		]);
	Route::resource('groups','GrupoController');
	Route::get('groups/{id}/destroy',[
			'uses'=>'GrupoController@destroy',
			'as'=>'admin.groups.destroy'
		]);
	Route::resource('solicitudes','SolicitudController');

	Route::get('solicitudes/{id}/create',[
			'uses'=>'SolicitudController@create',
			'as'=>'admin.solicitudes.create'
		]);

	Route::get('solicitudes/{id}/destroy',[
			'uses'=>'SolicitudController@destroy',
			'as'=>'admin.solicitudes.destroy'
		]);

	Route::get('profile',['uses' =>'DashboardController@profileadmin',
							'as' => 'admin.profile']);

	Route::put('profile/{id}',['uses'=>'DashboardController@adminupdateprofile',
								'as'=> 'admin.profile.update']);

});

Route::group(['prefix' => 'root', 'middleware'=> 'auth'], function(){
	Route::get('profile',['uses' =>'DashboardController@profileroot',
							'as' => 'root.profile']);

	Route::put('profile/{id}',['uses'=>'DashboardController@rootupdateprofile',
								'as'=> 'root.profile.update']);

	Route::get('users',['uses' => 'UsuarioController@viewusersroot',
	 					'as' => 'root.users.index']);

	Route::get('solicitudes/{id}/create',[
			'uses'=>'SolicitudController@createbyroot',
			'as'=>'root.solicitudes.create'
		]);


	Route::get('solicitudes/{id}/destroy',[
			'uses'=>'SolicitudController@destroybyroot',
			'as'=>'root.solicitudes.destroy'
		]);

	Route::get('solicitudes',[
			'uses'=>'SolicitudController@indexroot',
			'as'=>'root.solicitudes.index'
		]);

});

Route::group(['prefix' => 'psychologist', 'middleware'=> 'auth'], function(){
	Route::get('profile',['uses' =>'DashboardController@profilepsychologist',
							'as' => 'psychologist.profile']);

	Route::put('profile/{id}',['uses'=>'DashboardController@psychologistupdateprofile',
								'as'=> 'psychologist.profile.update']);

	Route::get('users',['uses' => 'UsuarioController@viewusers',
	 					'as' => 'psychologist.users.index']);

	Route::get('groups',['uses' => 'GrupoController@viewgroups',
	 					'as' => 'psychologist.groups.index']);

});

Route::group(['prefix' => 'student', 'middleware'=> 'auth'], function(){
	Route::get('profile',['uses' =>'DashboardController@profilestudent',
							'as' => 'student.profile']);

	Route::put('profile/{id}',['uses'=>'DashboardController@studentupdateprofile',
								'as'=> 'student.profile.update']);


});
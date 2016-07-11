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


Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'lar_dashboard'],function() {
		Route::get('/', [
			'as'	=> 'getMainDashboard',
			'uses'	=> 'MainController@getListNav'
		]);

		// Account Route
		Route::group(['prefix' => 'account'],function () {
			Route::get('/', [
				'as'   => 'getListAccount',
				'uses' => 'AccountController@getListAccount'
			]);
			Route::get('list', [
				'as'   => 'getListAccount',
				'uses' => 'AccountController@getListAccount'
			]);
			Route::get('add', [
				'as'	=> 'getAddAccount',
				'uses'	=> 'AccountController@getAddAccount'
			]);
			Route::post('add', [
				'as'	=> 'postAddAccount',
				'uses'	=> 'AccountController@postAddAccount',
			]);
			Route::get('del/account_id={id}', [
				'as'	=> 'getDeleteAccount',
				'uses'	=> 'AccountController@getDeleteAccount',
			])->where('id', '[0-9]+');

			Route::get('edit/account_id={id}', [
				'as'	=> 'getEditAccount',
				'uses'	=> 'AccountController@getEditAccount',
			])->where('id', '[0-9]+');

			Route::post('edit/account_id={id}', [
				'as'	=> 'postEditAccount',
				'uses'	=> 'AccountController@postEditAccount',
			])->where('id', '[0-9]+');

			// Route to change status of user
			Route::get('account_id={id}', [
				'as'	=> 'getChangeAccountStatus',
				'uses'	=> 'AccountController@getChangeAccountStatus'
			])->where('id', '[0-9]+');

		});

		// Post Route
		Route::group(['prefix' => 'post'], function () {
			Route::get('/', [
				'as'   => 'getListPost',
				'uses' => 'PostController@getListPost'
			]);
			Route::get('add', [
				'as'	=> 'getAddPost',
				'uses'	=> 'PostController@getAddPost'
			]);
			Route::post('add', [
				'as'	=> 'postAddPost',
				'uses'	=> 'PostController@postAddPost'
			]);
			Route::get('edit/post_id={id}', [
				'as'    => 'getEditPost',
				'uses'  => 'PostController@getEditPost'
			])->where('id', '[0-9]+');
		});

		// Categories Route
		Route::group(['prefix' => 'categories'], function () {
			Route::get('/', [
				'as'	=> 'getListAddCategory',
				'uses'	=> 'CategoryController@getListAddCategory'
			]);
			Route::post('add', [
				'as'	=> 'postAddCategory',
				'uses'	=> 'CategoryController@postAddCategory'
			]);
			Route::post('del', [
				'as'	=> 'postDelCategory',
				'uses'	=> 'CategoryController@postDelCategory'
			]);
			Route::get('del/category_id={id}', [
				'as'	=> 'getDelSingleCat',
				'uses'	=> 'CategoryController@getDelSingleCat'
			])->where('id', '[0-9]+');
			Route::get('edit/category_id={id}', [
				'as'	=> 'getEditCategory',
				'uses'	=> 'CategoryController@getEditCategory'
			])->where('id', '[0-9]+');
			Route::post('edit/category_id={id}', [
				'as'	=> 'postEditCategory',
				'uses'	=> 'CategoryController@postEditCategory'
			])->where('id', '[0-9]+');
			Route::post('search', [
				'as'    => 'postSearchCategory',
				'uses'  => 'CategoryController@postSearchCategory'
			]);
		});

		// Tags Route
		Route::group(['prefix'	=> 'tags'], function () {
			Route::get('/', [
				'as'	=> 'getListAddTags',
				'uses'	=> 'TagsController@getListAddTags'
			]);
			Route::post('add', [
				'as'	=> 'postAddTags',
				'uses'	=> 'TagsController@postAddTags'
			]);
			Route::post('del', [
				'as'	=> 'postDeleteMultiTags',
				'uses'	=> 'TagsController@postDeleteMultiTags'
			]);
			Route::get('del/tags_id={id}', [
				'as'	=> 'getDeleteSingleTag',
				'uses'	=> 'TagsController@getDeleteSingleTag'
			])->where('id', '[0-9]+');
			Route::get('edit/tags_id={id}', [
				'as'	=> 'getEditTags',
				'uses'	=> 'TagsController@getEditTags'
			])->where('id', '[0-9]+');	
			Route::post('edit/tags_id={id}', [
				'as'	=> 'postEditTags',
				'uses'	=> 'TagsController@postEditTags'
			]);
		});
	});
});

Route::get('dashboard_login', [
	'as'	=> 'getLogin',
	'uses'	=> 'LoginController@getLogin'
]);

Route::post('dashboard_login', [
	'as'	=> 'postLogin',
	'uses'	=> 'LoginController@postLogin'
]);

Route::get('dashboard_logout', [
	'as'	=> 'getLogout',
	'uses'	=> 'LoginController@getLogout'
]);	
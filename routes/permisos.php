<?php

Route::post('permission/store','PermissionController@store')->name('permission.store')
->middleware('can:permissions.create');

Route::get('permission','PermissionController@index')->name('permission.index')
->middleware('can:permissions.index');

Route::get('permission/create','PermissionController@create')->name('permission.create')
->middleware('can:permissions.create');

Route::put('permission/{permission}','PermissionController@update')->name('permission.update')
->middleware('can:permissions.edit');

Route::get('permission/{permission}','PermissionController@show')->name('permission.show')
->middleware('can:permissions.show');

Route::delete('permission/{permission}','PermissionController@destroy')->name('permission.destroy')
->middleware('can:permissions.destroy');

Route::get('permission/{permission}/edit','PermissionController@edit')->name('permission.edit')
->middleware('can:permissions.edit');

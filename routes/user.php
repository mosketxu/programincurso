<?php

    Route::post('user/store','UserController@store')->name('user.store')
        ->middleware('can:users.create');

    Route::get('user','UserController@index')->name('user.index')
        ->middleware('can:users.index');

    Route::get('user/create','UserController@create')->name('user.create')
        ->middleware('can:users.create');

    Route::put('user/{user}','UserController@update')->name('user.update')
        ->middleware('can:users.show');

    Route::get('user/{user}','UserController@show')->name('user.show')
        ->middleware('can:users.show');

    Route::delete('user/{user}','UserController@destroy')->name('user.destroy')
        ->middleware('can:users.destroy');

    Route::get('user/{user}/edit','UserController@edit')->name('user.edit')
        ->middleware('can:users.edit');


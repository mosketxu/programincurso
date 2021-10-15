<?php

use App\Http\Controllers\EmpresaController;


Route::post('empresa/store',[EmpresaController::class,'store'])->name('empresa.store')
->middleware('can:empresas.create');

Route::get('empresa',[EmpresaController::class,'index'])->name('empresa.index')
->middleware('can:empresas.index');

Route::get('empresa/create',[EmpresaController::class,'create'])->name('empresa.create')
->middleware('can:empresas.create');

Route::put('empresa',[EmpresaController::class,'update'])->name('empresa.update')
->middleware('can:empresas.edit');

Route::get('empresa/{empresa}',[EmpresaController::class,'show'])->name('empresa.show')
->middleware('can:empresas.show');

Route::delete('empresa/{empresa}',[EmpresaController::class,'destroy'])->name('empresa.destroy')
->middleware('can:empresas.destroy');

Route::get('empresa/{empresa}/edit',[EmpresaController::class,'edit'])->name('empresa.edit')
->middleware('can:empresas.edit');

// Route::get('empresa/{empresa}/go','EmpresaController@go')->name('empresa.go')
// ->middleware('can:empresas.edit');


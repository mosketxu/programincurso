<?php

use App\Http\Controllers\ContaRecurrenteController;


Route::post('contarecurrente/store',[ContarecurrenteController::class,'store'])->name('contarecurrente.store')
->middleware('can:contarecurrentes.create');

Route::get('contarecurrente/{empresa}',[ContarecurrenteController::class,'index'])->name('contarecurrente.index')
->middleware('can:contarecurrentes.index');

Route::get('contarecurrente/{empresa}/edit',[ContarecurrenteController::class,'edit'])->name('contarecurrente.edit')
->middleware('can:contarecurrentes.edit');

Route::get('contarecurrente/{empresa}/{anyo}/{periodo}/{tipo}/create',[ContarecurrenteController::class,'create'])->name('contarecurrente.create')
->middleware('can:contarecurrentes.edit');

Route::put('contarecurrente',[ContarecurrenteController::class,'update'])->name('contarecurrente.update')
->middleware('can:contarecurrentes.edit');

Route::get('contarecurrente/{empresa}/{tipo}',[ContarecurrenteController::class,'show'])->name('contarecurrente.show')
->middleware('can:contarecurrentes.show');

Route::post('contarecurrente',[ContarecurrenteController::class,'destroy'])->name('contarecurrente.destroy')
->middleware('can:contarecurrentes.destroy');

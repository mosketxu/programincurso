<?php

use App\Http\Controllers\ContactoController;


Route::post('contacto/store',[ContactoController::class,'store'])->name('contacto.store')
->middleware('can:contactos.create');

Route::get('contacto',[ContactoController::class,'index'])->name('contacto.index')
->middleware('can:contactos.index');

Route::get('contacto/create',[ContactoController::class,'create'])->name('contacto.create')
->middleware('can:contactos.create');

Route::put('contacto',[ContactoController::class,'update'])->name('contacto.update')
->middleware('can:contactos.edit');

Route::get('contacto/{contacto}',[ContactoController::class,'show'])->name('contacto.show')
->middleware('can:contactos.show');

Route::delete('contacto/{contacto}',[ContactoController::class,'destroy'])->name('contacto.destroy')
->middleware('can:contactos.destroy');

Route::get('contacto/{contacto}/edit',[ContactoController::class,'edit'])->name('contacto.edit')
->middleware('can:contactos.edit');


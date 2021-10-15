<?php

use App\Http\Controllers\FacturacionController;



Route::get('facturacion',[FacturacionController::class,'index'])->name('facturacion.index');
// ->middleware('can:facturacions.index');

Route::post('facturacion/store',[FacturacionController::class,'store'])->name('facturacion.store');
// ->middleware('can:facturacions.create');

Route::get('facturacion/create',[FacturacionController::class,'create'])->name('facturacion.create');
// ->middleware('can:facturacions.create');

Route::put('facturacion/{facturacion}',[FacturacionController::class,'update'])->name('facturacion.update');
// ->middleware('can:facturacions.edit');

Route::get('facturacion/{facturacion}',[FacturacionController::class,'show'])->name('facturacion.show');
// ->middleware('can:facturacions.show');

Route::delete('facturacion/{facturacion}',[FacturacionController::class,'destroy'])->name('facturacion.destroy');
// ->middleware('can:facturacions.destroy');

Route::get('facturacion/{facturacion}/edit',[FacturacionController::class,'edit'])->name('facturacion.edit');
// ->middleware('can:facturacions.edit');

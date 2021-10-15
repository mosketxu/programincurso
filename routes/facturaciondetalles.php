<?php

use App\Http\Controllers\FacturacionDetalleController;



Route::get('facturaciondetalle',[FacturacionDetalleController::class,'index'])->name('facturaciondetalle.index');
// ->middleware('can:facturaciondetalles.index');

Route::post('facturaciondetalle/store',[FacturacionDetalleController::class,'store'])->name('facturaciondetalle.store');
// ->middleware('can:facturaciondetalles.create');

Route::get('facturaciondetalle/create',[FacturacionDetalleController::class,'create'])->name('facturaciondetalle.create');
// ->middleware('can:facturaciondetalles.create');

Route::put('facturaciondetalle/{facturaciondetalle}',[FacturacionDetalleController::class,'update'])->name('facturaciondetalle.update');
// ->middleware('can:facturaciondetalles.edit');

Route::get('facturaciondetalle/{facturaciondetalle}',[FacturacionDetalleController::class,'show'])->name('facturaciondetalle.show');
// ->middleware('can:facturaciondetalles.show');

Route::delete('facturaciondetalle/{facturaciondetalle}',[FacturacionDetalleController::class,'destroy'])->name('facturaciondetalle.destroy');
// ->middleware('can:facturaciondetalles.destroy');

Route::get('facturaciondetalle/{facturaciondetalle}/edit',[FacturacionDetalleController::class,'edit'])->name('facturaciondetalle.edit');
// ->middleware('can:facturaciondetalles.edit');

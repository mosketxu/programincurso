<?php

use App\Http\Controllers\EmpresaImpuestoController;


Route::post('empresaimpuesto/store',[EmpresaImpuestoController::class,'store'])->name('empresaimpuesto.store')
->middleware('can:empresaimpuestos.create');

Route::get('empresaimpuesto/{empresa}',[EmpresaImpuestoController::class,'index'])->name('empresaimpuesto.index')
->middleware('can:empresaimpuestos.index');

Route::get('empresaimpuesto/create/{empresa}',[EmpresaImpuestoController::class,'create'])->name('empresaimpuesto.create')
->middleware('can:empresaimpuestos.create');

Route::put('empresacontacto',[EmpresaImpuestoController::class,'update'])->name('empresaimpuesto.update')
->middleware('can:empresaimpuestos.edit');

Route::get('empresaimpuesto/{empresa_id}',[EmpresaImpuestoController::class,'show'])->name('empresaimpuesto.show')
->middleware('can:empresaimpuestos.show');

Route::delete('empresaimpuesto/{empresacontacto}',[EmpresaImpuestoController::class,'destroy'])->name('empresaimpuesto.destroy')
->middleware('can:empresaimpuestos.destroy');

Route::get('empresaimpuesto/{empresacontacto}/edit',[EmpresaImpuestoController::class,'edit'])->name('empresaimpuesto.edit')
->middleware('can:empresaimpuestos.edit');

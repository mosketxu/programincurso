<?php

use App\Http\Controllers\EmpresaContactoController;


Route::post('empresacontacto/store',[EmpresaContactoController::class,'store'])->name('empresacontacto.store')
->middleware('can:empresacontactos.create');

Route::post('empresacontacto/storeempresas',[EmpresaContactoController::class,'storeempresas'])->name('empresacontacto.storeempresas')
->middleware('can:empresacontactos.create');

Route::post('empresacontacto/storecontacto/{empresa_id}',[EmpresaContactoController::class,'storecontacto'])->name('empresacontacto.storecontacto')
->middleware('can:empresacontactos.create');

Route::get('empresacontacto/',[EmpresaContactoController::class,'index'])->name('empresacontacto.index')
->middleware('can:empresacontactos.index');

Route::get('empresacontacto/create/{empresa}',[EmpresaContactoController::class,'create'])->name('empresacontacto.create')
->middleware('can:empresacontactos.create');

Route::put('empresacontacto/update',[EmpresaContactoController::class,'update'])->name('empresacontacto.update')
->middleware('can:empresacontactos.edit');

Route::get('empresacontacto/{empresa_id}',[EmpresaContactoController::class,'show'])->name('empresacontacto.show')
->middleware('can:empresacontactos.show');

Route::delete('empresacontacto/{empresacontacto}',[EmpresaContactoController::class,'destroy'])->name('empresacontacto.destroy')
->middleware('can:empresacontactos.destroy');

Route::get('empresacontacto/{empresacontacto}/edit',[EmpresaContactoController::class,'edit'])->name('empresacontacto.edit')
->middleware('can:empresacontactos.edit');



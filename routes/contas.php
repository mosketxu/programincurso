<?php

use App\Http\Controllers\ContaController;


Route::post('conta/store',[ContaController::class,'store'])->name('conta.store')
->middleware('can:contas.create');

Route::get('conta/{empresa}',[ContaController::class,'index'])->name('conta.index')
->middleware('can:contas.index');

Route::get('conta/{conta}/{anyo}/{periodo}/edit',[ContaController::class,'edit'])->name('conta.edit')
->middleware('can:contas.edit');

Route::get('conta/{empresa}/{periodo}/{anyo}/export',[ContaController::class,'export'])->name('conta.export')
->middleware('can:contas.index');


Route::get('conta/controlfactura/{empresa}/{provcli}/{factura}',[ContaController::class,'controlfactura2'])->name('conta.controlfactura2')
->middleware('can:contas.edit');

Route::get('conta/contas/{empresa}/{tipo}',[ContaController::class,'conta'])->name('conta.contas')
->middleware('can:contas.edit');

Route::get('conta/create',[ContaController::class,'create'])->name('conta.create')
->middleware('can:contas.create');

Route::post('conta/update',[ContaController::class,'update'])->name('conta.update')
->middleware('can:contas.edit');

Route::post('conta/updateon',[ContaController::class,'updateon'])->name('conta.updateon')
->middleware('can:contas.edit');

Route::get('conta/{empresa}/{tipo}',[ContaController::class,'show'])->name('conta.show')
->middleware('can:contas.show');

Route::post('conta/controlfactura',[ContaController::class,'controlfactura'])->name('conta.controlfactura')
->middleware('can:contas.edit');

Route::post('conta/{conta}',[ContaController::class,'destroy'])->name('conta.destroy')
->middleware('can:contas.destroy');


Route::get('conta/{conta}/go',[ContaController::class,'go'])->name('conta.go')
->middleware('can:contas.edit');



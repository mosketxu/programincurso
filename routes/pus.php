<?php

use App\Http\Controllers\PuController;


Route::post('pu/store',[PuController::class,'store'])->name('pu.store')
->middleware('can:pus.create');

Route::get('pu',[PuController::class,'index'])->name('pu.index')
->middleware('can:pus.index');

Route::get('pu/create',[PuController::class,'create'])->name('pu.create')
->middleware('can:pus.create');

Route::put('pu',[PuController::class,'update'])->name('pu.update')
->middleware('can:pus.edit');

Route::get('pu/{pu}',[PuController::class,'show'])->name('pu.show')
->middleware('can:pus.show');

Route::delete('pu/{pu}',[PuController::class,'destroy'])->name('pu.destroy')
->middleware('can:pus.destroy');

Route::get('pu/{pu}/edit',[PuController::class,'edit'])->name('pu.edit')
->middleware('can:pus.edit');


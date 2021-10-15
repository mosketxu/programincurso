<?php

use App\Http\Controllers\ProvcliController;


Route::post('provcli/store',[ProvcliController::class,'store'])->name('provcli.store')
->middleware('can:provclis.create');

Route::get('provcli',[ProvcliController::class,'index'])->name('provcli.index')
->middleware('can:provclis.index');

Route::get('provcli/categoriairpf/{prov_id}',[ProvcliController::class,'categoriairpf'])->name('provcli.categoriairpf')
->middleware('can:provclis.index');

Route::get('provcli/create',[ProvcliController::class,'create'])->name('provcli.create')
->middleware('can:provclis.create');

Route::put('provcli',[ProvcliController::class,'update'])->name('provcli.update')
->middleware('can:provclis.edit');

Route::get('provcli/{provcli}',[ProvcliController::class,'show'])->name('provcli.show')
->middleware('can:provclis.show');

Route::delete('provcli/{provcli}',[ProvcliController::class,'destroy'])->name('provcli.destroy')
->middleware('can:provclis.destroy');

Route::get('provcli/{provcli}/edit',[ProvcliController::class,'edit'])->name('provcli.edit')
->middleware('can:provclis.edit');


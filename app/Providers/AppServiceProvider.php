<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
// Builder

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('searchYear',function($field,$string){
            return $string ? $this->whereYear($field, 'like', '%'.$string.'%'): $this;
        });
        Builder::macro('searchMes',function($field,$string){
            return $string ? $this->whereMonth($field, 'like', '%'.$string.'%'): $this;
        });
        Builder::macro('searchComo',function($field,$string){
            return $string ? $this->where($field, 'like', '%'.$string.'%'): $this;
        });
        Builder::macro('searchIgual',function($field,$string){
            return $string ? $this->where($field,'=', $string): $this;
        });
        // ->when($this->filtroConta != '', function($query){
            //     $query->where('contabilizado',$this->filtroConta);
            //     })

    }
}

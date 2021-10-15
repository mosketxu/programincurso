<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

       
        if(auth()->user()->hasRole('Admin')){
            // return view('/empresa');
            return redirect()->route('empresa.index');
        }
        else{
            return view('home');
        }

        // elseif(auth()->user()->hasRole('grafitex')){
        //     return redirect()->route('campaign.index');
        // }
        // elseif(auth()->user()->hasRole('sgh')){
        //     return redirect()->route('store.index');
        // }
        // elseif(auth()->user()->hasRole('tienda')){
        //     return redirect()->route('tienda.index');
        // }        
    }
}

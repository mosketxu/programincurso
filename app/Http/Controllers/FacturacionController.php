<?php

namespace App\Http\Controllers;

use App\Facturacion;
use App\FacturacionDetalle;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturaciones=Facturacion::all();
        return view('facturacion.index',compact('facturaciones'));
    }

    public function detalle($facturacionId)
    {
        // $facturaciones=Facturacion::all();
        return view('facturacion.detalle',compact('facturacionId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        // $facturaciondetalles=FacturacionDetalle::where('facturacion_id',$facturacion->id)->get();
        // dd($facturacion);

        $facturacion=Facturacion::join('empresas','empresas.id','facturacions.empresa_id')
            ->select('facturacions.*', 'empresas.empresa')
            ->with('condpago')
            ->with('facturaciondetalles')
            ->find($facturacion->id);
        // dd($facturacion);

        return view('facturacion.edit', compact('facturacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturacion $facturacion)
    {
        //
    }
}

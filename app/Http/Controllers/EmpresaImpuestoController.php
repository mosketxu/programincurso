<?php

namespace App\Http\Controllers;

use App\{Empresa,Ciclo, EmpresaImpuesto,Impuesto};
use Illuminate\Http\Request;

class EmpresaImpuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empresa $empresa)
    {
        $impuestos=Impuesto::orderBy('modelo')->get();
        $ciclos=Ciclo::get();
        $empresaimpuestos=EmpresaImpuesto::where('empresa_id',$empresa->id)
        ->get();

        return view('empresa.empresaimpuesto.index',compact('empresaimpuestos','empresa','impuestos','ciclos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empresa $empresa)
    {
        $impuestos=Impuesto::orderBy('modelo')->get();
        $ciclos=Ciclo::get();
        return view('empresaimpuesto.create',compact('empresa','impuestos','ciclos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $impuestos=$request->impuestos;

        foreach($impuestos as $impuesto){
            $existe=Impuesto::find($impuesto);
            if(!is_null($existe))
                EmpresaImpuesto::create([
                    'empresa_id'=>$request->empresa_id,
                    'impuesto_id'=>$request->impuesto_id,
                    'ciclo_id'=>$request->ciclo_id,
                    'observaciones'=>$request->observaciones,
                ]);
        }

        return redirect()->back()->with('message', 'Impuestos Añadido');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpresaImpuesto  $empresaImpuesto
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresaImpuesto $empresaImpuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpresaImpuesto  $empresaImpuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresaImpuesto $empresaImpuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpresaImpuesto  $empresaImpuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaImpuesto $empresaImpuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpresaImpuesto  $empresaImpuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaImpuesto $empresaImpuesto)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\{CondicionPago, Empresa,Pais, Ciclo, Provincia, Suma, TipoEmpresa};
use App\Http\Requests\EmpresaRequest;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=($request->busca);

        $empresas=Empresa::search($request->busca)
        ->where('cliente',1)
        ->with('suma')
        ->orderBy('favorito','DESC')
        ->orderBy('empresa')
        ->get();

        $ciclos=Ciclo::all();
        $sumas=Suma::all();
        // dd($empresas);
        return view('empresa.index',compact('empresas','ciclos','sumas','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoempresas=TipoEmpresa::get();
        $sumas=Suma::get();

        $paises=Pais::get();
        $provincias=Provincia::get();
        return view('empresa.create',compact('tipoempresas','paises','provincias','sumas')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        // dd($request->all());
        Empresa::create($request->all());
        return response()->json(['message', 'Empresa Creada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $tipoempresas=TipoEmpresa::get();
        $sumas=Suma::get();
        $paises=Pais::get();
        $provincias=Provincia::get();
        $condpagos=CondicionPago::get();
        $ciclos=Ciclo::get();
        $empresa=Empresa::find($empresa->id);
      
        return view('empresa.edit',compact('empresa','tipoempresas','paises','provincias','condpagos','ciclos','sumas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request)
    {
        Empresa::find($request->id)->update($request->all());
        if($request->ajax())
            return response()->json(['message', 'Empresa Actualizada']);
        return redirect()->back()->with(['message'=>'Actualizado']);
    }

    /**
     * Remove the specified resource from storage. 
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($empresa_id)
    {
        $empresa=Empresa::find($empresa_id);
        $empresa->destroy($empresa_id);

        return response()->json(['message', 'Empresa  '.$empresa->empresa.' eliminada']);
    }
}

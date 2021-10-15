<?php

namespace App\Http\Controllers;

use App\{Pu,Empresa};
use App\Http\Requests\PuRequest;
use Illuminate\Http\Request;

class PuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(PuRequest $request)
    {
        Pu::create($request->all());
        return redirect()->back()->with('message', 'pu creada');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($empresa_id)
    {
        $empresa=Empresa::find($empresa_id);
        $pus = Pu::where('empresa_id',$empresa_id)
            ->get();
        return view('pu.index',compact('pus','empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pu  $pu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pu $pu)
    {
        $empresa=Empresa::find($pu->empresa_id);
        $pu = Pu::find($pu->id);
        return view('pu.edit',compact('pu','empresa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pu  $pu
     * @return \Illuminate\Http\Response
     */
    public function update(PuRequest $request)
    {
        Pu::find($request->id)->update($request->all());
        return redirect()->back()->with('message', 'Empresa Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pu  $pu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pu $pu)
    {
        $pu->delete();
        return redirect()->back()->with('message', 'Pu '.$pu->destino.' eliminado');
    }
}

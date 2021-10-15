<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvcliRequest;
use App\{Categoria, Provcli,Provincia,Pais};
use Illuminate\Http\Request;

class ProvcliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=($request->busca);
        $provclis=Provcli::search($request->busca)
        ->with('categoria')
        ->orderBy('nombre')
        ->paginate();
        $categorias=Categoria::get();
        return view('provcli.index',compact('provclis','busqueda','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::get();
        $provincias=Provincia::get();
        $categorias=Categoria::get();
        return view('provcli.create',compact('paises','provincias','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvcliRequest $request)
    {
        Provcli::create($request->all());
        if($request->ajax()){
            return response()->json(['message', 'Creado con éxito']);
        }
            return redirect()->back()->with('message', 'Creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provcli  $provcli
     * @return \Illuminate\Http\Response
     */
    public function show(Provcli $provcli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provcli  $provcli
     * @return \Illuminate\Http\Response
     */
    public function edit(Provcli $provcli)
    {
        $paises=Pais::get();
        $provincias=Provincia::get();
        $categorias=Categoria::get();
        $provcli=Provcli::find($provcli->id);
      
        return view('provcli.edit',compact('provcli','paises','provincias','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provcli  $provcli
     * @return \Illuminate\Http\Response
     */
    public function update(ProvcliRequest $request)
    {
        Provcli::find($request->id)->update($request->all());
        if($request->ajax()){
            return response()->json(['message', 'Actualizado']);
        }
        else{
            return redirect()->back()->with(['message'=>'Actualizado']);
        }

    }


    public function categoriairpf($provcli_id)
    {
        $provcli=Provcli::find($provcli_id);
        $cat=$provcli->categoria_id??'';
        $categoria=$cat!='' ? Categoria::find($provcli->categoria_id):'';
        $irpf=$provcli->irpf;
        return response()->json(['categoria'=>$categoria,'irpf'=>$irpf]);
        // return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provcli  $provcli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provcli $provcli)
    {
        $provcli->delete();
        return redirect()->back()->with('message', $provcli->nombre.' eliminado');

    }
}

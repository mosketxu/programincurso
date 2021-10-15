<?php

namespace App\Http\Controllers;

use App\{Departamento, Empresa,EmpresaContacto, Pais, Provincia,Contacto};
use App\Http\Requests\ContactoRequest;
use Illuminate\Http\Request;

class EmpresaContactoController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empresa $empresa)
    {
        $paises=Pais::get()
            ->prepend(new Pais(['pais'=>'--selecciona un pais--']));
        $provincias=Provincia::get()
            ->prepend(new Provincia(['provincia'=>'selecciona una provincia']));
        $departamentos=Departamento::get();
        return view('empresacontacto.create',compact('empresa','paises','provincias','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactos=$request->contactos;
        foreach($contactos as $contacto){
            $existe=Contacto::find($contacto);
            if(!is_null($existe))
                EmpresaContacto::create([
                    'empresa_id'=>$request->empresa_id,
                    'contacto_id'=>$contacto,
                    'departamento','-'
                ]);
        }

        return redirect()->back()->with('message', 'Contactos Añadidos');
        
    }

    public function storeempresas(Request $request)
    {
        EmpresaContacto::where('contacto_id',$request->contacto_id)->forceDelete();

        if($request->empresas)
            foreach($request->empresas as $empresa){
                $emp=Empresa::where('id',$empresa)->get();

                if($emp->count()>0)
                    EmpresaContacto::create([
                        'contacto_id'=>$request->contacto_id,
                        'empresa_id'=>$empresa,
                        'departamento','-'
                    ]);
            }

        return redirect()->back()->with('message', 'Contactos Añadidos');
    }

    public function storecontacto(ContactoRequest $request,$empresa_id)
    {
        $contacto=$request->contactos;
        $contacto=Contacto::create($request->except(['departamento']));
        
        EmpresaContacto::create([
            'empresa_id'=>$empresa_id,
            'contacto_id'=>$contacto->id,
            'departamento'=>$request->departamento,
            ]);
        
        return response()->json(['message', 'Contacto añadido']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($empresa_id,Request $request)
    {
        $empresa=Empresa::find($empresa_id);
        $busqueda=($request->busca);
        $empresacontactos=EmpresaContacto::search($request->busca) 
        ->where('empresa_id',$empresa_id)
        ->join('empresas','empresas.id','contacto_id')
        ->select('empresa_contacto.id as id','empresa_id','contacto_id','empresa','departamento','tfno','emailgral','emailadm','empresas.observaciones')
        ->orderBy('empresa')
        ->get();
       
        $departamentos=Departamento::get();
        $contactos = Empresa::whereNotIn('id', function ($query) use ($empresa_id) {
            $query->select('contacto_id')->from('empresa_contacto')->where('empresa_id', $empresa_id);
            })
            ->get();
        return view('empresacontacto.index',compact('empresacontactos','empresa','departamentos','contactos','busqueda'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpresaContacto  $empresaContacto
     * @return \Illuminate\Http\Response
     */
    public function edit($empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpresaContacto  $empresaContacto
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, EmpresaContacto $empresaContacto)
    public function update(Request $request)
    {
        dd('llego');
        EmpresaContacto::find($request->id)->update($request->all());
            return response()->json(['message', 'Departamento Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpresaContacto  $empresaContacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($empresaContacto)
    {
        EmpresaContacto::find($empresaContacto)->forceDelete();

        return response()->json(['message', 'Contacto eliminado']);

    }
}

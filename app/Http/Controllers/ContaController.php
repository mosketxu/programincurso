<?php

namespace App\Http\Controllers;

use App\{Categoria, Empresa, Conta, ContaRecurrente, Provcli,Periodo};
use App\Exports\ContaExport;
use App\Http\Requests\ContaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empresa $empresa, Request $request)
    {
        $recurrentes=ContaRecurrente::where('empresa_id',$empresa->id)
        ->join('provclis','provclis.id','conta_recurrentes.provcli_id')
        ->select('conta_recurrentes.id','empresa_id','tipo','concepto','nombre')
        ->orderBy('tipo')
        ->orderby('nombre')
        ->get();
        $provclis=Provcli::orderBy('nombre')->get();
        return view('empresa.conta.index',compact('empresa','recurrentes','provclis')); 
    }

    public function conta(Empresa $empresa, $tipo, Request $request){
        $busqueda=($request->busca);
        $anyo=$request->anyo ? $request->anyo : date("Y");
        $per=Periodo::find($request->periodo);
        $perI=$per->perI??'1';
        $perF=$per->perF??'12';
        $periodo= $request->periodo? $request->periodo: '17';
        $titulo=$tipo=='E'? 'Emitidas' : 'Recibidas';
        $fechaAs='';
        $facturanueva='';
        if ($tipo=='E')
            $facturanueva=$this->facturanueva($empresa->id);

        if(!is_null($per)){
            $periodo=$per->id;
            switch ($periodo) {
                case '13':
                    $fechaAs=$anyo.'-03-01';
                    break;
                case '14':
                    $fechaAs=$anyo.'-06-01';
                    break;
                case '15':
                    $fechaAs=$anyo.'-09-01';
                    break;
                case '16':
                    $fechaAs=$anyo.'-12-01';
                    break;
                default:
                    $fechaAs=$anyo.'-'.str_pad($perI,2,'0',STR_PAD_LEFT).'-'.'01';
                    break;
            }
         }
        $provclis=Provcli::orderBy('nombre')->get();
        $periodos=Periodo::get();
        $categorias=Categoria::orderBy('categoria')->get();

        $contas=Conta::search($request->busca)
        ->filtro($anyo,$perI,$perF)
        ->join('provclis','provclis.id','provcli_id')
        ->select('contas.*','provclis.nombre')
        ->where('empresa_id',$empresa->id)
        ->where('tipo',$tipo)
        ->with('provcli')
        ->orderBy('categoria_id','asc')
        ->orderBy('nombre','asc')
        ->orderBy('fechaasiento','asc')
        ->get();

        return view('empresa.conta.conta',compact('contas','empresa','provclis','periodos','categorias','busqueda','anyo','periodo','fechaAs','tipo','titulo','facturanueva')); 
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
    public function store(ContaRequest $request)
    {
        $prov=Provcli::find($request->provcli_id);
        $concepto=$this->modificaconcepto($request->factura,$prov->nombre,$request->concepto,$request->fechaasiento);
        $request->merge(['concepto'=>$concepto]);
        // $conta=Conta::create($request->all());
        $conta=Conta::create($request->except(['periodo','anyo']));
        $facturanueva=$conta->tipo=='E' ?  intval($conta->factura)+1 : '';
        $respuesta=[
            'facturanueva'=>$facturanueva,
            'tipo'=>$conta->tipo,
            'id'=>$conta->id,
            'token'=>$request->_token,
            'fechaasiento'=>$conta->fechaasiento,
            'fechafactura'=>$conta->fechafactura,
            'provcli'=>$prov->nombre,
            'factura'=>$conta->factura,
            'concepto'=>$conta->concepto,
            'categoria'=>$conta->categoria->categoria??'',
            'base21'=>number_format($conta->base21,2),
            'iva21'=>number_format($conta->iva21,2),
            'base10'=>number_format($conta->base10,2),
            'iva10'=>number_format($conta->iva10,2),
            'base4'=>number_format($conta->base4,2),
            'iva4'=>number_format($conta->iva4,2),
            'exento'=>number_format($conta->exento,2),
            'baseretencion'=>number_format($conta->baseretencion,2),
            'porcentajeretencion'=>number_format($conta->porcentajeretencion,2),
            'retencion'=>number_format($conta->retencion,2),
        ];
        if($conta->tipo=='E'){
            $respuesta['baserecargo']=number_format($conta->baserecargo,2);
            $respuesta['porcentajerecargo']=number_format($conta->porcentajerecargo,2);
            $respuesta['recargo']=number_format($conta->recargo,2);
            $respuesta['total']=number_format($conta->base21+$conta->iva21+$conta->base10+$conta->iva10+$conta->base4+$conta->iva4+$conta->exento-$conta->retencion+$conta->recargo,2);
        }
        $respuesta['total'] = number_format($conta->base21+$conta->iva21+$conta->base10+$conta->iva10+$conta->base4+$conta->iva4+$conta->exento-$conta->retencion+$conta->recargo,2);
        
        if($request->ajax()){
            return response()->json($respuesta);
        }
            return redirect()->back()->with(['message'=>'Añadido']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function show(conta $conta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * 
     */
    public function edit($conta,$anyo,$periodo)
    {
        $anyo=$anyo ? $anyo : date("Y");
        $per=Periodo::find($periodo);
        $perI=$per->perI??'1';
        $perF=$per->perF??'12';
        $provclis=Provcli::orderBy('nombre')->get();
        $periodos=Periodo::get();
        $categorias=Categoria::get();
        $conta=Conta::find($conta);
        $total=$conta->base21+$conta->iva21+$conta->base10+$conta->iva10+$conta->base4+$conta->iva4+$conta->exento-$conta->retencion+$conta->recargo;
        $empresa=Empresa::find($conta->empresa_id);

        return view('empresa.conta.edit',compact('conta','empresa','provclis','periodos','categorias','anyo','periodo','total')); 

    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ContaRequest $request)
    {
        $prov=Provcli::find($request->provcli_id);
        $concepto=$this->modificaconcepto($request->factura,$prov->nombre,$request->concepto,$request->fechaasiento);
        $request->merge(['concepto'=>$concepto]);
        $conta=Conta::find($request->id)->update($request->all());

        // return redirect()->back()->with(['message'=>'Actualizado']);
        return redirect()->route('conta.contas',[$request->empresa_id,$request->tipo])->with(['message'=>'Actualizado']);
    }

    public function updateon(ContaRequest $request)
    {
        $prov=Provcli::where('nombre',$request->provcli_id)
            ->first();
        $request->merge(['provcli_id'=>$prov->id]);
        $conta=Conta::find($request->id)->update($request->all());

        
        return redirect()->back()->with(['message'=>'Actualizado']);

    }

    public function controlfactura(Request $request)
    {
        if(!is_null($request->factura) && !is_null($request->provcli_id)){
            $existe=Conta::where('empresa_id',$request->empresa_id)
                ->where('provcli_id',$request->provcli_id)
                ->where('factura',$request->factura)
                ->get();
            return response()->json($existe->count());
        }
        else
            return response()->json(0);
    }

    public function controlfactura2($empresa_id,$provcli_id,$factura)
    {
        if(!is_null($factura) && !is_null($provcli_id)){
            $existe=Conta::where('empresa_id',$empresa_id)
                ->where('provcli_id',$provcli_id)
                ->where('factura',$factura)
                ->get();
            return response()->json($existe->count());
        }
        else
            return response()->json(0);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conta=Conta::find($id);
        $conta->destroy($id);

        return response()->json(['message', 'Asiento eliminado']);

    }


    protected function modificaconcepto($factura,$proveedor,$concepto,$fechaasiento){
        if(strlen($proveedor)>15)
            $proveedor=substr($proveedor,0,15);
        if(is_null($concepto)){
            if(!($factura=='')){
                $concepto='Fra.'. $factura .' ' . $proveedor;
            }else{
                setlocale(LC_ALL, 'es_ES');
                $fecha = Carbon::parse($fechaasiento);
                $mesTexto = $fecha->formatLocalized('%B');// mes en idioma español
                //$mfecha = $fecha->format('F'); //en ingles
                $mesNum = $fecha->month; // en numero
                $concepto=$proveedor .' '. $mesNum .' '. $mesTexto ;
            }
        }
        return $concepto;
    }

    public function export($empresa,$periodo,$anyo)
    {
        // dd($empresa.'-'.$periodo);
        return Excel::download(new ContaExport($empresa,$periodo,$anyo), 'conta.xlsx');
    }

    protected function facturanueva($empresaid){
        $facturas=Conta::select('factura')
            ->where('tipo','E')
            ->where('empresa_id',$empresaid)
            ->get();
        if($facturas->count()==0){
            $facturanueva=1;
        }else{
            $dataSet=[];
            foreach ($facturas as $fra) {
                $dataSet[]=[
                    'fra'=>intval($fra->factura),
                ];
            };
            $facturanueva=max($dataSet);
        }
        return $facturanueva['fra']+1;
    }

}
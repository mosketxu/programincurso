<?php

namespace App\Http\Livewire;

use App\{Facturacion,CondicionPago,Empresa, FacturacionDetalle};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Facturaciones extends Component
{

    // public $facturaciones;
    public $filtroEmpresa;
    public $filtroAnyo;
    public $filtroMes;
    public $empresas;
    public $filtroConta;
    public $filtroFactura;
    public $filtroEnviado;
    public $filtroPagado;
    public $muestraDetalle;
    public $sortField="factura";
    public $sortDirection='asc';
    public $showEditFacturacionModal=false;
    public $showDisabled='';
    public Facturacion $facturacion;
    public $empresasas;
    public $condiciones;

    use WithPagination;

    protected $paginationTheme= 'bootstrap';

    protected $rules = [
        'facturacion.id' => 'biginteger',
        'facturacion.factura' => 'required|string|max:9|min:8',
        'facturacion.fechafactura' => 'date',
        'facturacion.empresa_id' => 'integer',
        'facturacion.fechavto' => 'date',
        'facturacion.condpago_id' => 'required',
        'facturacion.subcuenta' => 'integer',
        'facturacion.fechacontabilizado' => 'date',
        'facturacion.contabilizado' => 'boolean',
        'facturacion.emailconta' => 'string',
        'facturacion.enviarmail' => 'boolean',
        'facturacion.mailenviado' => 'boolean',
        'facturacion.pagada' => 'boolean',
        'facturacion.refcliente' => 'string',
    ];

    public function mount()
    {
        // $this->facturaciones=Facturacion::all();
        $this->filtroEmpresa='';
        $this->filtroAnyo=date('Y');
        $this->filtroMes='';
        $this->filtroConta='0';
        $this->filtroFactura='';
        $this->filtroEnviado='';
        $this->filtroPagado='';
        $this->empresasas=Empresa::all();
        $this->condiciones=CondicionPago::all();
        $this->facturacion=$facturacion ?? new Facturacion;
        $this->facturaciondetalle=$facturaciondetalle ?? new FacturacionDetalle();
    }

    public function render()
    {
        // usleep(250000);
        $facturaciones=Facturacion::join('empresas','empresas.id','facturacions.empresa_id')
            ->select('facturacions.*', 'empresas.empresa')
            ->with('condpago')
            ->with('facturaciondetalles')
            ->when($this->filtroFactura !='',function ($query){
                $query->where('factura','like','%'.$this->filtroFactura.'%');
                })
            ->searchYear('fechafactura',$this->filtroAnyo)
            ->searchMes('fechafactura',$this->filtroMes)
            ->when($this->filtroConta != '', function($query){
                $query->where('contabilizado',$this->filtroConta);
                })
            ->when($this->filtroEnviado != '' ,function ($query){
                $query->where('mailenviado',$this->filtroEnviado);
                })
            ->when($this->filtroPagado != '' ,function ($query){
                $query->where('pagada',$this->filtroPagado);
                })
            ->when($this->filtroEmpresa !='', function($query){
                $query->whereHas('empresa',function($query2){
                    $query2->where('empresa','like','%'.$this->filtroEmpresa.'%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(20);

        return view('livewire.facturaciones',[
            'facturaciones'=>$facturaciones
        ]);
    }

    public function updatingFiltroEmpresa()
    {
        $this->resetPage();
    }
    public function updatingFiltroAnyo()
    {
        $this->resetPage();
    }
    public function updatingFiltroMes()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortField=$field;
    }

    public function create()
    {
        $this->showDisabled='disabled';
        $this->facturacion = Facturacion::make(['id'=>'','contabilizado'=>0,'mailenviado'=>0,'pagada'=>0,]); //resetea e inicializa el modelo
        $this->showEditFacturacionModal = true;
    }

    public function createDetalle()
    {
        $this->showDisabled='disabled';
        $this->facturaciondetalle = FacturacionDetalle::make(['id'=>'','unidades'=>1,'coste'=>0,'suplido'=>0,'pagadopor'=>0,]); //resetea e inicializa el modelo
        $this->showEditFacturacionDetalleModal = true;
    }

    public function edit(Facturacion $facturacion)
    {
        $this->showDisabled='';
        $this->facturacion = $facturacion;

        $this->showEditFacturacionDetalleModal = false;
        $this->showEditFacturacionModal = true;
    }

    public function abre()
    {
        return view('livewire.facturaciondetalle');
    }

    public function editDetalle(Facturacion $facturacion)
    {
        $facturaciondetalles=FacturacionDetalle::where('facturacion_id',$facturacion->id)->get();
        return view('livewire.facturaciondetalle',[
            'facturaciondetalles'=>$facturaciondetalles
        ]);
    }

    public function save()
    {
        if ($this->facturacion->id===null) {
            $this->validateOnly('facturacion.empresa_id');
            $this->validateOnly('facturacion.fechafactura');
            $year = substr($this->facturacion->fechafactura, 0, 4);
            $month = substr($this->facturacion->fechafactura, 5, 2);
            $day = intval(substr($this->facturacion->fechafactura, 8, 2));
            $serie=substr($this->facturacion->fechafactura, 2, 2);
            $max = intval(substr(Facturacion::whereYear('fechafactura',$year)->max('factura'),-5))+1;
            $factura=$serie.'/'.str_pad($max, 5, "0", STR_PAD_LEFT);
            $datos=Empresa::find($this->facturacion->empresa_id);
            $this->facturacion->factura=$factura;
            $diavencimiento=$datos->diavencimiento==='' ?? '10';
            $dayVto=$this->facturacion->fechavto==='' ?? $year.'/'.$month.'/'.$diavencimiento;

            $this->facturacion->fechavto!='' ??  $dayVto;
            $this->facturacion->factura=$factura;
            $this->facturacion->enviarmail=$datos->enviaremail;
            $this->facturacion->condpago_id=$datos->condicionpago_id;
            $this->facturacion->refcliente=$datos->referenciacliente;
            $this->facturacion->subcuenta=$datos->cuentacontable;
            $this->validate();
        }
        $this->facturacion->save();
        $this->showEditFacturacionModal = false;
    }

    public function saveDetalle()
    {
        $this->validate();
        $this->facturaciondetalle->save();
        $this->showEditFacturacionDetalleModal = false;
    }

    public function deleteFacturacion($facturacion_id)
    {
        Facturacion::find($facturacion_id)->delete();
    }

    public function deleteFacturacionDetalle($facturaciondetalle_id)
    {
        FacturacionDetalle::find($facturaciondetalle_id)->delete();
    }

    public function close()
    {
        $this->showEditFacturacionModal = false;
        $this->showEditFacturacionDetalleModal = false;
    }
}

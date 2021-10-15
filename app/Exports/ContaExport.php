<?php

namespace App\Exports;

use App\{Conta,Periodo};
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection, Maatwebsite\Excel\Concerns\WithHeadings;

class ContaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $empresa;
    protected $periodo;

    function __construct($empresa,$periodo,$anyo) { 
        $this->empresa = $empresa;
        $this->periodo = $periodo;
        $this->anyo = $anyo;
    }

    public function headings(): array
    {
        return [
            'Empresa',
            'E/R',
            'Id',
            'F.Asiento',
            'F.Factura',
            'ProvCli',
            'N.Factura',
            'Concepto',
            'Categoria_id',
            'Total',
            'Base 21',
            'IVA 21',
            'Base 10',
            'IVA 10',
            'Base 4',
            'IVA 4',
            'Exento',
            'Base Ret.',
            '% Ret',
            'Ret',
            'Base R.eq.',
            '% R.eq.',
            'R.eq.',
            'Observaciones',
            'Creado',
            'Actualizado',
        ];
    }

    public function collection()
    {
        $per=Periodo::find($this->periodo);
        $perI=$per->perI??'1';
        $perF=$per->perF??'12';
        $periodo= $this->periodo? $this->periodo: '17';

        $result= Conta::where('empresa_id',$this->empresa)
        ->filtro($this->anyo,$perI,$perF)
        ->join('empresas','empresas.id','empresa_id')
        ->join('provclis','provclis.id','provcli_id')
        ->join('categorias','categorias.id','contas.categoria_id')
        ->select('empresa','tipo','contas.id','fechaasiento','fechafactura','nombre','factura','concepto','categoria',DB::raw('(base21+iva21+base10+iva10+base4+iva4+exento+recargo-retencion) as total'),'base21','iva21','base10','iva10','base4','iva4','exento','baseretencion','porcentajeretencion','retencion','baserecargo','porcentajerecargo','recargo','contas.observaciones','contas.created_at','contas.updated_at')
        ->orderBy('tipo')
        ->orderBy('nombre')
        ->orderBy('fechafactura')
        ->get();

        // dd($result);
        return $result;
    }
}

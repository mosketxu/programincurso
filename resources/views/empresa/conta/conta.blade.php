@extends('layouts.programin')

@section('title','Programin-Go')
@section('titlePag',$titulo)
@section('navbar')
@include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') {{$empresa->empresa}}</p>
@include('empresa.conta.navbar')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        <div class="content-header">
        </div>
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid"> 
                @include('layouts.partials.mensajes')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="card-title">Facturas {{$titulo}}</h3><br>
                            <h6 class="col text-right"><span class="text-primary">Base Soportado: </span>:<br>{{number_format($contas->sum('base21')+$contas->sum('base10')+$contas->sum('base4')+$contas->sum('baserecargo'),2)}}</h6><br>
                            <h6 class="col text-right"><span class="text-primary">IVA Soportado: </span><br>{{number_format($contas->sum('iva21')+$contas->sum('iva10')+$contas->sum('iva4')+$contas->sum('recargo'),2)}}</h6>
                            <h6 class="col text-right"><span class="text-primary">Base Retención: </span><br>{{number_format($contas->sum('baseretencion'),2)}}</h6>
                            <h6 class="col text-right"><span class="text-primary">Total Retención: </span><br>{{number_format($contas->sum('retencion'),2)}}</h6>
                            <h6 class="col text-right"><span class="text-primary">Total Exento: </span><br>{{number_format($contas->sum('exento'),2)}}</h6>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table>
                            <thead>
                                <form id="form" action="{{route('conta.contas',[$empresa,$tipo])}}" method="get">
                                <tr>
                                    <th><a href="#" onclick="form.submit()"><i class="fas fa-filter"></i></a></th>
                                    <th>
                                        <select name="anyo" id="anyo" class="form-control form-control-plaintext form-control-sm" onchange="form.submit()">
                                            <option value="2019" {{$anyo=='2019'? 'selected' :''}}>2019</option>
                                            <option value="2020" {{$anyo=='2020'? 'selected' :''}}>2020</option>
                                            <option value="2021" {{$anyo=='2021'? 'selected' :''}}>2021</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select name="periodo" id="periodo"  class="form-control form-control-plaintext form-control-sm" onchange="form.submit()">
                                            @foreach ($periodos as $peri)
                                            <option value="{{$peri->id}}" {{$peri->id==$periodo ? 'selected' :''}}>{{$peri->periodo}}
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        <select name="provcli" id="provcli"  class="form-control form-control-plaintext form-control-sm" onchange="form.submit()">
                                            {{-- @foreach ($provclis as $provcli)
                                            <option value="{{$provcli->id}}" {{$provcli->id==$provcli ? 'selected' :''}}>{{$provcli->nombre}}
                                            @endforeach --}}
                                        </select>
                                    </th>
                                    <th> &nbsp;&nbsp;</th>
                                    <th><a href="{{route('contarecurrente.create',[$empresa,$anyo,$periodo,$tipo])}}"><i class="fas fa-redo text-info"></i><span class="text-info"> Recurrentes</span></a></th>
                                    <th> &nbsp;&nbsp;</th>
                                    <th><a href="{{route('provcli.create')}}"><i class="fas fa-plus-circle text-warning"></i> <span class="text-warning">Nuevo Proveedor</span></a></th>
                                    <th> &nbsp;&nbsp;</th>
                                    <th><a href="{{route('conta.export',[$empresa,$periodo,$anyo])}}"><i class="far fa fa-file-excel text-success fa-lg mx-1"></i><span class="text-success">Exportar</span></a></th>
                                </tr>
                                </form>
                            </thead>
                        </table>
                        @include('empresa.conta.tablaconta')
                    </div>
                    <div class="card-footer">
                        @include('empresa.conta.tablaadd')
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal control factura-->
    <div class="modal fade" id="controlfactura" tabindex="-1" role="dialog" aria-labelledby="controlfactura" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="controlfactura">Factura existente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Esta factura ya existe para este proveedor.<br>
                ¿Deseas mantenerla?
            </div>
            <div class="modal-footer">
            <button type="button" id="ctrlFacturaYes"class="btn btn-primary" data-dismiss="modal">Sí</button>
            <button type="button" id="ctrlFacturaNo"class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scriptchosen')
    <script src="{{ asset('js/conta.js')}}"></script>
    <script>
    </script>
@endpush


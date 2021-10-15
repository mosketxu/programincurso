@extends('layouts.programin')

@section('title','Programin-Go')
@section('titlePag','Go')
@section('navbar')
@include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') {{$empresa->empresa}}-{{$empresa->nif}}</p>
@include('empresa.conta.navbar')
@include('layouts.partials.navbarderecha')

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
                <div class="card">
                    <!-- card-header -->
                    <div class="card-header">
                        <form method="POST" action="{{ route("pu.store") }}">
                        @csrf
                        <input type="hidden" name="empresa_id" value="{{$empresa->id}}">
                        <div class="row">
                            <div class="form-group col">
                                <label for="destino">Destino</label>
                                <input type="text" class="form-control form-control-sm" name="destino" id="destino">
                            </div>
                            <div class="form-group col">
                                <label for="us">Us</label>
                                <input type="text" class="form-control form-control-sm" name="us" id="us">
                            </div>
                            <div class="form-group col">
                                <label for="us2">Us2</label>
                                <input type="text" class="form-control form-control-sm" name="us2" id="us2">
                            </div>
                            <div class="form-group col">
                                <label for="ps">Ps</label>
                                <input type="text" class="form-control form-control-sm" name="ps" id="ps">
                            </div>
                            <div class="form-group col">
                                <label for="observaciones">Observaciones</label>
                                <input type="text" class="form-control form-control-sm" name="observaciones" id="observaciones">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a class="btn btn-default" href="{{route('empresa.index')}}" title="Ir la página anterior">Volver</a>
                    </div>

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10 row">
                                {{-- {{ $empresas->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
                                <span class="badge text-primary"> Pág {{$empresas->currentPage()}} de {{$empresas->lastPage()}} </span> --}}
                            </div>
                            {{-- <div class="card-tools col-auto"> --}}
                            <div class="col-2 mb-2">
                                {{-- <form method="GET" action="{{route('empresa.index') }}">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="busca" class="form-control float-right" value='{{$busqueda}}' placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                </form> --}}
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table table-hover table-sm small text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha Asiento</th>
                                    <th>Fecha Factura</th>
                                    <th>Factura</th>
                                    <th>Provcli</th>
                                    <th>Base 21%</th>
                                    <th>Iva 21%</th>
                                    <th>Base Ret</th>
                                    <th>% Ret</th>
                                    <th>Retención</th>
                                    <th>Base 10%</th>
                                    <th>Iva 10%</th>
                                    <th>Base 4%</th>
                                    <th>Iva 4%</th>
                                    <th>R.eq 5.20%</th>
                                    <th>5.20%</th>
                                    <th>R.eq 1.4%</th>
                                    <th>1.4%</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- card-footer -->
                    <div>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
    <script>
    </script>
@endpush


@extends('layouts.programin')

@section('title','Programin-Empresas')
@section('titlePag','Empresas')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') </p>
    @can('empresas.create')
    &nbsp;&nbsp; <a href="{{route('empresa.create')}}"><i class="fas fa-plus-circle fa-2x text-primary mt-2"></i></a>
    @endcan
    @include('empresa.navbar')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        <div class="content-header">
        </div>
        {{-- - /.content-header --}}
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- card-header -->
                    {{-- <div class="card-header">
                    </div> --}}
                    <!-- card-body -->
                    <div class="card-body">
                        {{-- <div class="table-responsive p-0" style="height: 450px"> --}}
                        <div id="tablaempresa" class="table-responsive p-0 alturatabla2">
                            <table class="table table-hover table-sm small table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th width="5px"></th>
                                    <th width=10px>#</th>
                                    <th></th>
                                    <th>Empresa</th>
                                    <th>Nif</th>
                                    <th>Tfno</th>
                                    <th>Email</th>
                                    <th>Provincia</th>
                                    <th>Cliente</th>
                                    <th>Tipo</th>
                                    <th>Impuestos</th>
                                    <th>Facturacion</th>
                                    <th>Suma</th>
                                    <th width="20px">Estado</th>
                                    <th width=100px></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($empresas as $empresa)
                                    <tr id="tr{{$empresa->id}}">
                                        <td><a href="{{route('conta.index',$empresa) }}" title="go"><i class="fab fa-goodreads text-primary fa-lg ml-3"></i></a></td>
                                        <td class="badge badge-default">{{$empresa->id}}</a></td>
                                        <td class="mt-1 pt-1 {{($empresa->favorito==1) ? "text-warning" : "text-grey"}}"><i class="{{($empresa->favorito==1) ? "fas fa-star" : "far fa-star"}}"></i></td>
                                        <td>{{$empresa->empresa}}</td>
                                        <td>{{$empresa->nif}}</td>
                                        <td>{{$empresa->tfno}}</td>
                                        <td>{{$empresa->emailgral}}</td>
                                        <td>{{$empresa->provincia_id}}</td>
                                        <form id="form{{$empresa->id}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$empresa->id}}" >
                                            <input type="hidden" name="empresa" value="{{$empresa->empresa}}" >
                                            <input type="hidden" name="tipoempresa" value="{{$empresa->tipoempresa}}" >
                                            <td>
                                                <select class="selectsinborde" name="cliente" id="cliente{{$empresa->id}}" onchange="update('form{{$empresa->id}}','{{ route('empresa.update') }}')" required aria-placeholder="cliente">
                                                    <option value="{{old('cliente','0')}}" {{$empresa->cliente=='0' ? 'selected' : '' }}>No</option>
                                                    <option value="{{old('cliente','1')}}"  {{$empresa->cliente=='1' ? 'selected' : ''}}>Sí</option>
                                                </select>
                                            </td>
                                        <td>{{$empresa->tipoempresa}}</td>
                                        <td>
                                            <select class="selectsinborde" name="periodoimpuesto_id" id="periodoimpuesto_id{{$empresa->id}}" onchange="update('form{{$empresa->id}}','{{ route('empresa.update') }}')" required aria-placeholder="cliente">
                                                @foreach($ciclos as $ciclo)
                                                    <option value="{{$ciclo->id}}" {{$empresa->periodoimpuesto_id==$ciclo->id ? 'selected' : '' }}>{{$ciclo->ciclo}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="selectsinborde" name="periodofacturacion_id" id="periodofacturacion_id{{$empresa->id}}" onchange="update('form{{$empresa->id}}','{{ route('empresa.update') }}')" required aria-placeholder="cliente">
                                                @foreach($ciclos as $ciclo)
                                                    <option value="{{$ciclo->id}}" {{$empresa->periodofacturacion_id==$ciclo->id ? 'selected' : '' }}>{{$ciclo->ciclo}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="selectsinborde" name="suma_id" id="suma_id{{$empresa->id}}" onchange="update('form{{$empresa->id}}','{{ route('empresa.update') }}')" required aria-placeholder="suma_id">
                                                @foreach($sumas as $suma)
                                                    <option value="{{ $suma->id }}" {{$suma->id==$empresa->suma_id ? 'selected' : ''}}>{{ $suma->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        </form>

                                        <td class="mt-1 pt-1 badge {{($empresa->estado==0) ? "badge-danger" : "badge-success"}}">{{($empresa->estado==0) ? "Baja" : "Activo"}}</td>
                                        <td  class="text-right m-0 pr-3">
                                            <form  id="formDelete{{$empresa->id}}">
                                                <a href="{{route('pu.show', $empresa) }}" title="pu"><i class="fas fa-key text-warning  ml-3"></i></a>
                                                <a href="{{route('empresacontacto.show', $empresa) }}" title="contactos"><i class="fas fa-users text-success fa-lg ml-3 mr-3"></i></a>
                                                <a href="{{route('empresa.edit', $empresa) }}" title="Editar empresa"><i class="far fa-edit text-primary fa-lg ml-2"></i></a>
                                                {{-- <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                                                @method('DELETE')
                                                @csrf
                                                <a href="#!" class="btn-delete " title="Eliminar" onclick="eliminar('{{route('empresa.destroy',$empresa->id)}}','{{$empresa->id}}')"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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


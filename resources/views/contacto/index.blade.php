@extends('layouts.programin')

@section('title','Programin-Contactos')
@section('titlePag','Contactos')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') </p>
    @can('contactos.create')
    &nbsp;&nbsp; <a href="{{route('contacto.create')}}"><i class="fas fa-plus-circle fa-2x text-primary mt-2"></i></a>
    @endcan
    @include('contacto.navbar')
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
                        <div class="row">
                            <div class="col-10 row">
                                {{ $contactos->appends(request()->except('page'))->links() }} &nbsp; &nbsp;
                                <span class="badge text-primary"> Pág {{$contactos->currentPage()}} de {{$contactos->lastPage()}} </span>
                            </div>
                            {{-- <div class="card-tools col-auto"> --}}
                            <div class="col-2 mb-2">
                            </div>
                        </div>

                        {{-- mensajes de exito o error --}}
                        @include('layouts.partials.mensajes')
                        {{-- fin mensajes de exito o error --}}

                        <div class="table-responsive p-0">
                            <table class="table table-hover table-sm small text-nowrap">
                                <thead>
                                <tr>
                                    <th width=10px>#</th>
                                    <th>Nombre</th>
                                    <th>Nif</th>
                                    <th>Tfno</th>
                                    <th>Email 1</th>
                                    <th>Email 2</th>
                                    <th>Provincia</th>
                                    <th>Cliente</th>
                                    <th>Tipo</th>
                                    <th  width=20px;>Estado</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($contactos as $contacto)
                                    <tr id="tr{{$contacto->id}}">
                                        <td class="badge badge-default">{{$contacto->id}}</a></td>
                                        <td><a href="{{route('contacto.edit', $contacto) }}">{{$contacto->empresa}}</a></td>
                                        <td>{{$contacto->nif}}</td>
                                        <td>{{$contacto->tfno}}</td>
                                        <td>{{$contacto->emailgral}}</td>
                                        <td>{{$contacto->emailadm}}</td>
                                        <td>{{$contacto->provincia_id}}</td>
                                        <form id="form{{$contacto->id}}" >
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$contacto->id}}" >
                                            <input type="hidden" name="empresa" value="{{$contacto->empresa}}" >
                                            <input type="hidden" name="tipoempresa" value="{{$contacto->tipoempresa}}" >
                                            <td>
                                                <select class="selectsinborde" name="cliente" id="cliente" onchange="update('form{{$contacto->id}}','{{ route('contacto.update') }}')" required aria-placeholder="cliente">
                                                    <option value="{{old('cliente','0')}}" {{$contacto->cliente=='0' ? 'selected' : '' }}>No</option>
                                                    <option value="{{old('cliente','1')}}"  {{$contacto->cliente=='1' ? 'selected' : ''}}>Sí</option>
                                                </select>
                                            </td>
                                        </form>
                                        <td>{{$contacto->tipoempresa}}</td>
                                        <td class="mt-1 pt-1 badge {{($contacto->estado==0) ? "badge-danger" : "badge-success"}}">{{($contacto->estado==0) ? "Baja" : "Activo"}} </td>
                                        <td  class="text-right m-0 p-0">
                                            <form  id="formDelete{{$contacto->id}}">
                                                <a href="{{route('contacto.edit', $contacto) }}" title="Editar contacto"><i class="far fa-edit text-primary fa-lg ml-3"></i></a>
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <a href="#!" class="btn-delete " title="Eliminar" onclick="eliminar('{{route('contacto.destroy',$contacto->id)}}','{{$contacto->id}}')"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
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


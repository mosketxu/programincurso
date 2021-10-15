@extends('layouts.programin')

@section('title','Programin-Editar Contacto')
@section('titlePag','Editar Contacto')
@section('navbar')
@include('layouts.partials.navbarizquierda')
<p class="h3 pt-2 text-dark">@yield('titlePag') {{$contacto->empresa}}</p> 
@include('contacto.navbar')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div>
        {{-- - /.content-header --}}
        {{-- main content  --}}
        <section class="content">
            <div class="cemontainer-fluid"> 
                <div class="card">
                {{-- mensajes de exito o error --}}
                @include('layouts.partials.mensajes')
                
                <form id="form" method="POST" action="{{ route("contacto.update") }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="{{$contacto->id}}">
                            <div class="form-group col">
                                <label class="required" for="empresa">Nombre</label>
                                <input class="form-control form-control-sm" type="text" name="empresa" id="name" value="{{ old('name', $contacto->empresa) }}" required>
                            </div>
                            <div class="form-group col-1">
                                <label for="nif">Nif</label>
                                <input class="form-control form-control-sm" type="text" name="nif" id="nif" value="{{ old('nif', $contacto->nif) }}">
                            </div>
                            <div class="form-group col-1    ">
                                <label class="required" for="cliente">Cliente</label>
                                <select class="form-control form-control-sm" name="cliente" id="cliente" required aria-placeholder="cliente">
                                    <option value="{{old('cliente','0')}}" {{$contacto->cliente=='0' ? 'selected' : '' }}>No</option>
                                    <option value="{{old('cliente','1')}}"  {{$contacto->cliente=='1' ? 'selected' : ''}}>Sí</option>
                                </select>
                            </div>
                            <div>
                                <label class="required" for="tipoempresa">Tipo</label>
                                <select class="form-control form-control-sm" name="tipoempresa" id="tipoempresa" required aria-placeholder="tipo">
                                    <option value="{{ $contacto->tipoempresa }}">{{ $contacto->tipoempresa }}</option>
                                    @foreach($tipoempresas as $tipoempresa)
                                        <option value="{{ $tipoempresa->tipoempresa }}">{{ $tipoempresa->tipoempresa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-1">
                                <label for="estado">Estado</label>
                                <select class="form-control form-control-sm" name="estado" id="estado">
                                    <option value="{{old('estado','0')}}" {{$contacto->estado=='0' ? 'selected' : '' }}>Baja</option>
                                    <option value="{{old('estado','1')}}"  {{$contacto->estado=='1' ? 'selected' : ''}}>Activo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="direccion">Dirección</label>
                                <input class="form-control form-control-sm" type="text" name="direccion" id="direccion" value="{{ old('direccion', $contacto->direccion) }}">
                            </div>
                            <div class="form-group col-1">
                                <label for="codpostal">Código Postal</label>
                                <input class="form-control form-control-sm" type="text" name="codpostal" id="codpostal" value="{{ old('codpostal', $contacto->codpostal) }}">
                            </div>
                            <div class="form-group col">
                                <label for="localidad">Localidad</label>
                                <input class="form-control form-control-sm" type="text" name="localidad" id="localidad" value="{{ old('localidad', $contacto->localidad) }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="provincia_id">Provincia</label>
                                <select class="form-control form-control-sm" name="provincia_id" id="provincia_id">
                                    <option value="">-- Selecciona --</option>
                                    @foreach($provincias as $id => $provincia)
                                        <option value="{{old('provincia_id',$provincia->id)}}"  {{ $provincia->provincia == $contacto->provincia['provincia'] ? 'selected' : '' }}>{{ $provincia->provincia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-1">
                                <label for="pais_id">País</label>
                                <select class="form-control form-control-sm" name="pais_id" id="pais_id">
                                    @if(!$contacto->pais_id)
                                    <option value="">-- Selecciona --</option>
                                    @endif
                                    @foreach($paises as $pais)
                                        <option value="{{old('pais_id',$pais->id)}}"  {{ $pais->pais == $contacto->pais['pais'] ? 'selected' : '' }}>{{ $pais->pais }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-1">
                                <label for="idioma">Idioma</label>
                                <select class="form-control form-control-sm" name="idioma" id="idioma">
                                    <option value="{{old('idioma','ES')}}" {{$contacto->idioma=='ES' ? 'selected' : '' }}>ES</option>
                                    <option value="{{old('idioma','EN')}}"  {{$contacto->idioma=='EN' ? 'selected' : ''}}>EN</option>
                                    <option value="{{old('idioma','CA')}}"  {{$contacto->idioma=='CA' ? 'selected' : ''}}>CA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-2">
                                <label for="tfno">Teléfono</label>
                                <input class="form-control form-control-sm" type="text" name="tfno" id="tfno" value="{{ old('tfno', $contacto->tfno) }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="emailgral">@ 1</label>
                                <input class="form-control form-control-sm" type="text" name="emailgral" id="emailgral" value="{{ old('emailgral', $contacto->emailgral) }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="emailadm">@ 2</label>
                                <input class="form-control form-control-sm" type="text" name="emailadm" id="emailadm" value="{{ old('emailadm', $contacto->emailadm) }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="web">Web</label>
                                <input class="form-control form-control-sm" type="text" name="web" id="web" value="{{ old('web', $contacto->web) }}">
                            </div>
                            <div class="form-group col-1">
                                <label for="banco">Banco</label>
                                <input class="form-control form-control-sm" type="text" name="banco" id="banco" value="{{ old('banco', $contacto->banco) }}">
                            </div>
                            <div class="form-group col">
                                <label for="iban">Iban</label>
                                <input class="form-control form-control-sm" type="text" name="iban" id="iban" value="{{ old('iban', $contacto->iban) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="observaciones">Observaciones</label>
                                {{-- <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $contacto->observaciones) }}"> --}}
                                <textarea class="form-control form-control-sm" rows=3 name="observaciones" id="observaciones"> {{ old('observaciones', $contacto->observaciones) }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                {{-- <button class="btn btn-primary" type="submit">Actualizar</button> --}}
                                <a class="btn btn-primary" href="#" title="actualizar" onclick="update('form','{{ route('contacto.update') }}')">Actualizar</a>
                                {{-- <a class="btn btn-default" href="{{route('contacto.index')}}" title="Ir la página anterior">Volver</a> --}}
                                <a class="btn btn-default" href="{{url()->previous()}}" title="Ir la página anterior">Volver</a>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- card-footer -->
                    <div class="card-footer">
                        <form method="POST" action="{{ route("empresacontacto.storeempresas") }}">
                        @csrf
                        <input type="hidden" name="contacto_id" value="{{$contacto->id}}">
                        <label for="empresas">Empresas relacionadas</label>
                        <select class="form-control" name="empresas[]" id="empresas" multiple="multiple">
                            @foreach($empresas as $empresa)
                                <option value="{{$empresa->id}}" {{in_array($empresa->id,$empresasasociadas) ? 'selected' : ''}}>{{$empresa->empresa}}</option>
                            @endforeach
                        </select>
                        <button type="submit">Guardar</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
<script>
    $(document).ready(function(){
        $('#empresas').select2({
            placeholder :"Selecciona empresas",
            tags:true,
            allowClear:true
        });
    });

</script>

@endpush


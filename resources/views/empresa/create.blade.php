@extends('layouts.programin')

@section('title','Programin-Empresas')
@section('titlePag','Crea Empresa')
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
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- card-body -->
                    {{-- <form id="creaForm"> --}}
                    <form id="creaForm" action="{{route('empresa.store')}}" method="post">
                        @csrf
                        <div class="card-body small">
                            <div class="row">
                                <div class="form-group col">
                                    <label class="required" for="empresa">Empresa</label>
                                    <input class="form-control form-control-sm" type="text" name="empresa" id="empresa" value="{{ old('empresa', '') }}" required>
                                </div>
                                <div class="form-group col-2">
                                    <label for="nif">Nif</label>
                                    <input class="form-control form-control-sm" type="text" name="nif" id="nif" value="{{ old('nif', '') }}">
                                </div>
                                <div class="form-group col-2">
                                    <label class="required" for="tipoempresa">Tipo</label>
                                    <select class="form-control form-control-sm" name="tipoempresa" id="tipoempresa" required aria-placeholder="tipo">
                                        @foreach($tipoempresas as $tipoempresa)
                                        <option value="{{ $tipoempresa->tipoempresa }}">{{ $tipoempresa->tipoempresa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <label for="estado">Estado</label>
                                    <select class="form-control form-control-sm" name="estado" id="estado" required aria-placeholder="estado">
                                        <option value="{{old('estado','1')}}" selected >Activo</option>
                                        <option value="{{old('estado','0')}}" >Baja</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label class="required" for="cliente">Cliente</label>
                                    <select class="form-control form-control-sm" name="cliente" id="cliente" required aria-placeholder="cliente">
                                        <option value="{{old('cliente','0')}}" >No</option>
                                        <option value="{{old('cliente','1')}}" selected >Sí</option>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <label for="nif">Cuenta Contable</label>
                                    <input class="form-control form-control-sm" type="text" name="cuentacontable" id="cuentacontable" value="{{ old('cuentacontable', '') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="direccion">Dirección</label>
                                    <input class="form-control form-control-sm" type="text" name="direccion" id="direccion" value="{{ old('direccion', '') }}">
                                </div>
                                <div class="form-group col-1">
                                    <label for="codpostal">Código Postal</label>
                                    <input class="form-control form-control-sm" type="text" name="codpostal" id="codpostal" value="{{ old('codpostal', '') }}">
                                </div>
                                <div class="form-group col">
                                    <label for="localidad">Localidad</label>
                                    <input class="form-control form-control-sm" type="text" name="localidad" id="localidad" value="{{ old('localidad', '') }}">
                                </div>
                                <div class="form-group col-2">
                                    <label for="provincia_id">Provincia</label>
                                    <select class="form-control form-control-sm" name="provincia_id" id="provincia_id">
                                        <option value="08" selected >Barcelona</option>
                                        @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" {{ old('provincia_id') == $provincia->id ? 'selected' : '' }}>{{ $provincia->provincia }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <label for="pais_id">País</label>
                                    <select class="form-control form-control-sm" name="pais_id" id="pais_id">
                                            <option value="ES"  selected>España</option>
                                        @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>{{ $pais->pais }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="tfno">Teléfono</label>
                                    <input class="form-control form-control-sm" type="text" name="tfno" id="tfno" value="{{ old('tfno', '') }}">
                                </div>
                                <div class="form-group col">
                                    <label for="emailgral">@ General</label>
                                    <input class="form-control form-control-sm" type="text" name="emailgral" id="emailgral" value="{{ old('emailgral', '') }}">
                                </div>
                                <div class="form-group col">
                                    <label for="emailadm">@ Administración</label>
                                    <input class="form-control form-control-sm" type="text" name="emailadm" id="emailadm" value="{{ old('emailadm', '') }}">
                                </div>
                                <div class="form-group col">
                                    <label for="web">Web</label>
                                    <input class="form-control form-control-sm" type="text" name="web" id="web" value="{{ old('web', '') }}">
                                </div>
                                <div class="form-group col-1">
                                    <label for="idioma">Idioma</label>
                                    <select class="form-control form-control-sm" name="idioma" id="idioma">
                                        <option value="ES" {{ old('idioma') == "ES" ? 'selected' : '' }}>ES</option>
                                        <option value="EN" {{ old('idioma') == "EN" ? 'selected' : '' }}>EN</option>
                                        <option value="CA" {{ old('idioma') == "CA" ? 'selected' : '' }}>CA</option>
                                    </select>
                                </div>
                                <div class="form-group col-1">
                                    <label for="porcentajemarta">% M</label>
                                    <input class="form-control form-control-sm" type="number" name="porcentajemarta" id="porcentajemarta" value="{{ old('porcentajemarta',100) }}">
                                </div>
                                <div class="form-group col-1">
                                    <label for="porcentajesusana">% S</label>
                                    <input class="form-control form-control-sm" type="number" name="porcentajesusana" id="porcentajesusana" value="{{ old('porcentajesusana',0) }}">
                                </div>
                            </div>
                                <div class="form-group col">
                                    <label for="observaciones">Observaciones</label>
                                    <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{route('empresa.index')}}" title="Ir la página anterior">Volver</a>
                                <a class="btn btn-primary" href="#" title="Actualizar" onclick="update('creaForm','{{ route('empresa.store') }}',1)">Guardar</a>
                                {{-- <button type="submit">submit</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    @endsection

@push('scriptchosen')
<script>
    

</script>
@endpush


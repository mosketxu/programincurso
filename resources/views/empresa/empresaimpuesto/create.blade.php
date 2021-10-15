@extends('layouts.programin')

@section('title','Programin-Nuevo Contacto')
@section('titlePag','Crear contacto')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') de {{$empresa->empresa}} <span class="small">({{$empresa->nif}})</span></p>
    &nbsp;&nbsp; <a href="{{route('contacto.create')}}"><i class="fas fa-plus-circle fa-2x text-primary mt-2"></i></a> 
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
                    <form id="creaForm">
                    @csrf
                    <div class="card-body small">
                        <input type="hidden" name="tipoempresa" id="tipoempresa" value="Contacto">
                        <input type="hidden" name="estado" id="estado" value="1">
                        <input type="hidden" name="cliente" id="cliente" value="0">
                        <input type="hidden" name="periodofacturacion_id" id="periodofacturacion_id" value="0">
                        <div class="row">
                            <div class="form-group col">
                                <label class="required" for="empresa">Nombre</label>
                                <input class="form-control form-control-sm" type="text" name="empresa" id="empresa" value="{{ old('empresa', '') }}" required>
                            </div>
                            <div class="form-group col-2">
                                <label for="nif">Nif</label>
                                <input class="form-control form-control-sm" type="text" name="nif" id="nif" value="{{ old('nif', '') }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="departamento">Departamento</label>
                                <select class="form-control form-control-sm" name="departamento" id="departamento">
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->departamento }}">{{ $departamento->departamento }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="direccion">Dirección</label>
                                <input class="form-control form-control-sm" type="text" name="direccion" id="direccion" value="{{ old('direccion', '') }}">
                            </div>
                            <div class="form-group col-1">
                                <label for="codpostal">C.Postal</label>
                                <input class="form-control form-control-sm" type="text" name="codpostal" id="codpostal" value="{{ old('codpostal', '') }}">
                            </div>
                            <div class="form-group col">
                                <label for="localidad">Localidad</label>
                                <input class="form-control form-control-sm" type="text" name="localidad" id="localidad" value="{{ old('localidad', '') }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="provincia_id">Provincia</label>
                                <select class="form-control form-control-sm" name="provincia_id" id="provincia_id">
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" >{{ $provincia->provincia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-1">
                                <label for="pais_id">País</label>
                                <select class="form-control form-control-sm" name="pais_id" id="pais_id">
                                    <option value="ES">España</option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}" >{{ $pais->pais }}</option>
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
                                <label for="emailgral">@ 1</label>
                                <input class="form-control form-control-sm" type="text" name="emailgral" id="emailgral" value="{{ old('emailgral', '') }}">
                            </div>
                            <div class="form-group col">
                                <label for="emailadm">@ 2</label>
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
                            <div class="form-group col-2">
                                <label for="banco">Banco</label>
                                <input class="form-control form-control-sm" type="text" name="banco" id="banco" value="{{ old('banco') }}">
                            </div>
                            <div class="form-group col">
                                <label for="iban">Iban</label>
                                <input class="form-control form-control-sm" type="text" name="iban" id="iban" value="{{ old('iban') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="observaciones">Observaciones</label>
                                <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <a class="btn btn-primary" href="#" title="actualizar" onclick="update('creaForm','{{ route('empresacontacto.storecontacto',$empresa->id) }}',1)">Guardar</a>
                            {{-- <a class="btn btn-default" href="{{route('empresacontacto.show',$empresa->id)}}" title="Ir la página anterior">Volver</a> --}}
                            <a class="btn btn-default" href="{{url()->previous()}}" title="Ir la página anterior">Volver</a>
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


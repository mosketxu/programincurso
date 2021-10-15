@extends('layouts.programin')

@section('title','Programin-Editar Empresa')
@section('titlePag','Editar empresa')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag')</p>
    @include('empresa.navbar')
    {{-- @include('layouts.partials.navbarderecha') --}}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        <div class="content-header">
            {{-- <div class="container-fluid">
            </div> --}}
        </div>
        {{-- - /.content-header --}}
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    {{-- mensajes de exito o error --}}
                    @include('layouts.partials.mensajes')

                    {{-- <form method="POST" action="{{ route("empresa.update") }}"> --}}
                        <form id="creaForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{$empresa->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-body border border-primary rounded">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label class="required" for="empresa">Empresa</label>
                                                    <input class="form-control form-control-sm" type="text" name="empresa" id="name" value="{{ old('empresa', $empresa->empresa) }}" maxlength="255" required>
                                                </div>
                                                <div class="form-group col-1">
                                                    <label for="favorito">Favorito</label>
                                                    <select class="form-control form-control-sm" name="favorito" id="favorito">
                                                        <option value="{{old('favorito','1')}}"  {{$empresa->favorito=='1' ? 'selected' : ''}}>Sí</option>
                                                        <option value="{{old('favorito','0')}}" {{$empresa->favorito=='0' ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-2">
                                                    <label for="nif">Nif</label>
                                                    <input class="form-control form-control-sm" type="text" name="nif" id="nif" value="{{ old('nif', $empresa->nif) }}" maxlength="12">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="direccion">Dirección</label>
                                                    <input class="form-control form-control-sm" type="text" name="direccion" id="direccion" value="{{ old('direccion', $empresa->direccion) }}" maxlength="100">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-2">
                                                    <label for="codpostal">CP</label>
                                                    <input class="form-control form-control-sm" type="text" name="codpostal" id="codpostal" value="{{ old('codpostal', $empresa->codpostal) }}" maxlength="10">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="localidad">Localidad</label>
                                                    <input class="form-control form-control-sm" type="text" name="localidad" id="localidad" value="{{ old('localidad', $empresa->localidad) }}" maxlength="100">
                                                </div>
                                                <div class="form-group col-3">
                                                    <label for="provincia_id">Provincia</label>
                                                    <select class="form-control form-control-sm" name="provincia_id" id="provincia_id">
                                                        @if(!$empresa->provincia_id)
                                                            <option value="">-- Selecciona --</option>
                                                        @endif
                                                        @foreach($provincias as $id => $provincia)
                                                            <option value="{{old('provincia_id',$provincia->id)}}"  {{ $provincia->provincia == $empresa->provincia['provincia'] ? 'selected' : '' }}>{{ $provincia->provincia }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-2">
                                                    <label for="pais_id">País</label>
                                                    <select class="form-control form-control-sm" name="pais_id" id="pais_id">
                                                        @foreach($paises as $pais)
                                                            <option value="{{old('pais_id',$pais->id)}}"  {{ $pais->pais == $empresa->pais->pais ? 'selected' : '' }}>{{ $pais->pais }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body  border border-primary rounded">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="periodoimpuesto_id">Impuestos</label>
                                                    <select class="form-control form-control-sm" name="periodoimpuesto_id" id="periodoimpuesto_id">
                                                        @foreach($ciclos as $ciclo)
                                                            <option value="{{old('periodoimpuesto_id',$ciclo->id)}}"  {{ $ciclo->ciclo == ($empresa->ciclo->ciclo??'-') ? 'selected' : '' }}>{{ $ciclo->ciclo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label class="required" for="cliente">Cliente</label>
                                                    <select class="form-control form-control-sm" name="cliente" id="cliente" required aria-placeholder="cliente">
                                                        <option value="{{old('cliente','0')}}" {{$empresa->cliente=='0' ? 'selected' : '' }}>No</option>
                                                        <option value="{{old('cliente','1')}}"  {{$empresa->cliente=='1' ? 'selected' : ''}}>Sí</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label class="required" for="tipoempresa">Tipo</label>
                                                    <select class="form-control form-control-sm" name="tipoempresa" id="tipoempresa" required aria-placeholder="tipo">
                                                        <option value="{{ $empresa->tipoempresa }}">{{ $empresa->tipoempresa }}</option>
                                                        @foreach($tipoempresas as $tipoempresa)
                                                            <option value="{{ $tipoempresa->tipoempresa }}">{{ $tipoempresa->tipoempresa }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="estado">Estado</label>
                                                    <select class="form-control form-control-sm" name="estado" id="estado">
                                                        <option value="{{old('estado','0')}}" {{$empresa->estado=='0' ? 'selected' : '' }}>Baja</option>
                                                        <option value="{{old('estado','1')}}"  {{$empresa->estado=='1' ? 'selected' : ''}}>Activo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="cuentacontable">Cta.Cont</label>
                                                    <input class="form-control form-control-sm" type="text" name="cuentacontable" id="cuentacontable" value="{{ old('cuentacontable', $empresa->cuentacontable) }}" maxlength="10">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="idioma">Idioma</label>
                                                    <select class="form-control form-control-sm" name="idioma" id="idioma">
                                                        <option value="{{old('idioma','ES')}}" {{$empresa->idioma=='ES' ? 'selected' : '' }}>ES</option>
                                                        <option value="{{old('idioma','EN')}}"  {{$empresa->idioma=='EN' ? 'selected' : ''}}>EN</option>
                                                        <option value="{{old('idioma','CA')}}"  {{$empresa->idioma=='CA' ? 'selected' : ''}}>CA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="tipoiva">IVA</label>
                                                    <select class="form-control form-control-sm" name="tipoiva" id="tipoiva">
                                                        <option value="{{old('tipoiva','0.21')}}" {{$empresa->tipoiva=='0.21' ? 'selected' : '' }}>21%</option>
                                                        <option value="{{old('tipoiva','0.10')}}"  {{$empresa->tipoiva=='0.10' ? 'selected' : ''}}>10%</option>
                                                        <option value="{{old('tipoiva','0.04')}}"  {{$empresa->tipoiva=='0.04' ? 'selected' : ''}}>4%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body border border-primary rounded">
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="contactosuma">Resp.Suma</label>
                                                <select class="form-control form-control-sm" name="suma_id" id="suma_id" aria-placeholder="tipo">
                                                    @foreach($sumas as $suma)
                                                        <option value="{{ $suma->id }}" {{$suma->id==$empresa->suma_id ? 'selected' : ''}}>{{ $suma->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label for="tfno">Teléfono</label>
                                                <input class="form-control form-control-sm" type="text" name="tfno" id="tfno" value="{{ old('tfno', $empresa->tfno) }}" maxlength="15">
                                            </div>
                                            {{-- <div class="form-group col">
                                                <label for="porcentajemarta">% M</label>
                                                <input class="form-control form-control-sm" type="number" name="porcentajemarta" id="porcentajemarta" value="{{ old('porcentajemarta', $empresa->porcentajemarta) }}">
                                            </div> --}}
                                            <div class="form-group col">
                                                <label for="porcentajesusana">% S</label>
                                                <input class="form-control form-control-sm" type="number" name="porcentajesusana" id="porcentajesusana" value="{{ old('porcentajesusana', $empresa->porcentajesusana) }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="emailgral">@ General</label>
                                                <input class="form-control form-control-sm" type="text" name="emailgral" id="emailgral" value="{{ old('emailgral', $empresa->emailgral) }}" maxlength="100">
                                            </div>
                                            <div class="form-group col">
                                                <label for="emailadm">@ Adm.</label>
                                                <input class="form-control form-control-sm" type="text" name="emailadm" id="emailadm" value="{{ old('emailadm', $empresa->emailadm) }}" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="banco">Banco</label>
                                                <input class="form-control form-control-sm" type="text" name="banco" id="banco" value="{{ old('banco', $empresa->banco) }}" maxlength="100">
                                            </div>
                                            <div class="form-group col">
                                                <label for="iban">Iban</label>
                                                <input class="form-control form-control-sm" type="text" name="iban" id="iban" value="{{ old('iban', $empresa->iban) }}" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card-body border border-info rounded">
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="condicionpago_id">Cond.Pago</label>
                                                <select class="form-control form-control-sm" name="condicionpago_id" id="condicionpago_id">
                                                    @foreach($condpagos as $condpagos)
                                                        <option value="{{old('condicionpago_id',$condpagos->id)}}"  {{ $condpagos->condicionpago == $empresa->condicionpago->condicionpago ? 'selected' : '' }}>{{ $condpagos->condicionpago  }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label for="periodofacturacion_id">Per.Fact</label>
                                                <select class="form-control form-control-sm" name="periodofacturacion_id" id="periodofacturacion_id">
                                                    @foreach($ciclos as $ciclo)
                                                        <option value="{{old('periodofacturacion_id',$ciclo->id)}}"  {{ $ciclo->ciclo == ($empresa->ciclo->ciclo??'-') ? 'selected' : '' }}>{{ $ciclo->ciclo }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label for="diafactura">Dia Fact.</label>
                                                <input class="form-control form-control-sm" type="number" name="diafactura" id="diafactura" value="{{ old('diafactura', $empresa->diafactura) }}" maxlength="2">
                                            </div>
                                            <div class="form-group col">
                                                <label for="diavencimiento">Dia Vto.</label>
                                                <input class="form-control form-control-sm" type="number" name="diavencimiento" id="diavencimiento" value="{{ old('diavencimiento', $empresa->diavencimiento) }}" maxlength="2">
                                            </div>
                                            <div class="form-group col">
                                                <label for="referenciacliente">Ref.Cliente</label>
                                                <input class="form-control form-control-sm" type="text" name="referenciacliente" id="referenciacliente" value="{{ old('referenciacliente', $empresa->referenciacliente) }}" maxlength="30">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="conceptofacturacionprincipal">Concepto Ppal.</label>
                                                <input class="form-control form-control-sm" type="text" name="conceptofacturacionprincipal" id="conceptofacturacionprincipal" value="{{ old('conceptofacturacionprincipal', $empresa->conceptofacturacionprincipal) }}" maxlength="200">
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="importefacturacionprincipal">€ Ppal</label>
                                                <input class="form-control form-control-sm" type="number" step="0.01" name="importefacturacionprincipal" id="importefacturacionprincipal" value="{{ old('importefacturacionprincipal', $empresa->importefacturacionprincipal) }}">
                                            </div>
                                            <div class="form-group col">
                                                <label for="conceptofacturacionsecundario">Concepto Sec.</label>
                                                <input class="form-control form-control-sm" type="text" name="conceptofacturacionsecundario" id="conceptofacturacionsecundario" value="{{ old('conceptofacturacionsecundario', $empresa->conceptofacturacionsecundario) }}" maxlength="200">
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="importefacturacionsecundario">€ Sec.</label>
                                                <input class="form-control form-control-sm" type="number" step="0.01" name="importefacturacionsecundario" id="importefacturacionsecundario" value="{{ old('importefacturacionsecundario', $empresa->importefacturacionsecundario) }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="observaciones">Observaciones</label>
                                                <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $empresa->observaciones) }}" maxlength="255">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                {{-- <button class="btn btn-primary" type="submit">Actualizar</button> --}}
                                <a class="btn btn-primary" href="#" title="Ir la página anterior" onclick="update('creaForm','{{ route('empresa.update') }}',0)">Actualizar</a>
                                <a class="btn btn-default" href="{{route('empresa.index')}}" title="Ir la página anterior">Volver</a>
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


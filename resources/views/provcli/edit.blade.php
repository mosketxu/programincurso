@extends('layouts.programin')

@section('title','Programin-Editar Prov/Cli')
@section('titlePag','Editar Prov/Cli')
{{-- @section('navbar')
    @include('layouts.partials.navbarizquierda')
    @include('layouts.partials.navbarderecha')
@endsection --}}

@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag')</p>
    @include('provcli.navbar')
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
                    {{-- <div class="card-header">
                    </div> --}}

                    {{-- mensajes de exito o error --}}
                    @include('layouts.partials.mensajes')
                    {{-- fin mensajes de exito o error --}}


                    <form method="POST" id="form" action="{{ route("provcli.update") }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <input type="hidden" name="id" id="id" value="{{$provcli->id}}">
                                    <label class="required" for="nombre">Prov/Cli</label>
                                    <input class="form-control form-control-sm" type="text" name="nombre" id="nombre" value="{{ old('nombre', $provcli->nombre) }}" maxlength="255" required>
                                </div>
                                <div class="form-group col">
                                    <label for="categoria_id">Categoria</label>
                                    <select class="form-control form-control-sm select2"  name="categoria_id" id="categoria_id" style="width: 100%;">
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{$categoria->id==$provcli->categoria_id?'selected':''}}>{{ $categoria->categoria }} - {{ $categoria->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-1">
                                    <label for="irpf">IRPF</label>
                                    <select class="form-control form-control-sm" name="irpf" id="irpf">
                                        <option value="0" {{$provcli->irpf=='0'?'selected':''}}>0</option>
                                        <option value="0.07" {{$provcli->irpf=='0.07'?'selected':''}}>7%</option>
                                        <option value="0.15" {{$provcli->irpf=='0.15'?'selected':''}}>15%</option>
                                        <option value="0.19" {{$provcli->irpf=='0.19'?'selected':''}}>19%</option>
                                    </select>
                                </div>

                                <div class="form-group col-1">
                                    <label for="nif">Nif</label>
                                    <input class="form-control form-control-sm" type="text" name="nif" id="nif" value="{{ old('nif', $provcli->nif) }}" maxlength="12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-1">
                                    <label for="codpostal">Código Postal</label>
                                    <input class="form-control form-control-sm" type="text" name="codpostal" id="codpostal" value="{{ old('codpostal', $provcli->codpostal) }}" maxlength="10">
                                </div>
                                <div class="form-group col">
                                    <label for="localidad">Localidad</label>
                                    <input class="form-control form-control-sm" type="text" name="localidad" id="localidad" value="{{ old('localidad', $provcli->localidad) }}" maxlength="100">
                                </div>
                                <div class="form-group col-2">
                                    <label for="provincia_id">Provincia</label>
                                    <select class="form-control form-control-sm" name="provincia_id" id="provincia_id">
                                        @if(!$provcli->provincia_id)
                                            <option value="">-- Selecciona --</option>
                                        @endif
                                        @foreach($provincias as $id => $provincia)
                                            <option value="{{old('provincia_id',$provincia->id)}}"  {{ $provincia->provincia == $provcli->provincia['provincia'] ? 'selected' : '' }}>{{ $provincia->provincia }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-1">
                                    <label for="pais_id">País</label>
                                    <select class="form-control form-control-sm" name="pais_id" id="pais_id">
                                        @foreach($paises as $pais)
                                            <option value="{{old('pais_id',$pais->id)}}"  {{ $pais->pais == $provcli->pais->pais ? 'selected' : '' }}>{{ $pais->pais }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-1">
                                    <label for="tfno">Teléfono</label>
                                    <input class="form-control form-control-sm" type="text" name="tfno" id="tfno" value="{{ old('tfno', $provcli->tfno) }}" maxlength="15">
                                </div>
                                <div class="form-group col">
                                    <label for="email">@ General</label>
                                    <input class="form-control form-control-sm" type="text" name="email" id="email" value="{{ old('email', $provcli->email) }}" maxlength="100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="banco1">Banco1</label>
                                    <input class="form-control form-control-sm" type="text" name="banco1" id="banco1" value="{{ old('banco1', $provcli->banco1) }}" maxlength="100">
                                </div>
                                <div class="form-group col">
                                    <label for="iban">Iban1</label>
                                    <input class="form-control form-control-sm" type="text" name="iban1" id="iban1" value="{{ old('iban1', $provcli->iban1) }}" maxlength="50">
                                </div>
                                <div class="form-group col">
                                    <label for="banco2">Banco2</label>
                                    <input class="form-control form-control-sm" type="text" name="banco2" id="banco2" value="{{ old('banco2', $provcli->banco2) }}" maxlength="100">
                                </div>
                                <div class="form-group col">
                                    <label for="iban2">Iban2</label>
                                    <input class="form-control form-control-sm" type="text" name="iban2" id="iban2" value="{{ old('iban2', $provcli->iban2) }}" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="observaciones">Observaciones</label>
                                    <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $provcli->observaciones) }}" maxlength="255">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                {{-- <button class="btn btn-primary" type="submit">Actualizar</button> --}}
                                <a class="btn btn-primary" href="#" title="actualizar" onclick="update('form','{{ route('provcli.update') }}')">Actualizar</a>
                                <a class="btn btn-default" href="{{url()->previous()}}" title="Ir la página anterior">Volver</a>
                                {{-- <a class="btn btn-default" href="{{route('provcli.index')}}" title="Ir la página anterior">Volver</a> --}}
                                
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


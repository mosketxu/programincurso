@extends('layouts.programin')

@section('title','Programin-Editar Pu')
@section('titlePag','Editar Pu')
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
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-sm-3 text-left pl-2"> --}}
                    <div class="col-auto">
                        <p class="h3 pt-2 text-dark">@yield('titlePag')</p>
                    </div>
                    <div class="col-auto mr-auto">
                    </div>
                    <div class="col-sm-3 text-right pr-2">
                    <a href="{{url()->previous()}}">Volver</a>
                    </div>
                </div>
            </div>
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

                    <form method="POST" action="{{ route("pu.update") }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <input type="hidden" name="id" id="id" value="{{$pu->id}}">
                            <div class="row">
                                <div class="form-group col">
                                    <label class="required" for="destino">Destino</label>
                                    <input class="form-control form-control-sm" type="text" name="destino" id="destino" value="{{ old('destino', $pu->destino) }}" required>
                                </div>
                                <div class="form-group col">
                                    <label for="us">Us</label>
                                    <input class="form-control form-control-sm" type="text" name="us" id="us" value="{{ old('us', $pu->us) }}">
                                </div>
                                <div class="form-group col">
                                    <label for="us2">Us2</label>
                                    <input class="form-control form-control-sm" type="text" name="us2" id="us2" value="{{ old('us2', $pu->us2) }}">
                                </div>
                                <div class="form-group col">
                                    <label for="ps">Ps</label>
                                    <input class="form-control form-control-sm" type="text" name="ps" id="ps" value="{{ old('ps', $pu->ps) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="observaciones">Observaciones</label>
                                    <input class="form-control form-control-sm" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $pu->observaciones) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                <a class="btn btn-default" href="{{route('pu.show',$empresa)}}" title="Ir la página anterior">Volver</a>
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


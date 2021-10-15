@extends('layouts.programin')

@section('title','Programin-Editar Recurrente')
@section('titlePag','Editar Prov/Cli')
{{-- @section('navbar')
    @include('layouts.partials.navbarizquierda')
    @include('layouts.partials.navbarderecha')
@endsection --}}

@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag')</p>
    @include('empresa.conta.recurrente.navbar')
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

                    <form method="POST" action="{{ route("contarecurrente.update") }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{$recurrente->id}}">
                            <label for="provcli_id">Prov/Cli</label>
                            <select class="form-control form-control-sm select2"  name="provcli_id" id="provcli_id" style="width: 100%;">
                                @foreach($provclis as $provcli)
                                    <option value="{{ $provcli->id }}" {{$provcli->id==$recurrente->provcli_id ? 'selected':''}}>{{ $provcli->nombre }}</option>
                                @endforeach
                            </select>
                            <label for="tipo">Tipo</label>                            
                            <select class="form-control form-control-sm"  name="tipo" id="tipo" style="width: 100%;">
                                <option value="E" {{ $recurrente->tipo=='E' ? 'selected': '' }}>Emitidas</option>
                                <option value="R" {{ $recurrente->tipo=='R' ? 'selected' : ''}}>Recibidas</option>
                            </select>
                            <label for="concepto">Concepto</label>                            
                            <input class="form-control form-control-sm" type="text" name="concepto" id="concepto" value="{{$recurrente->concepto}}">
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                <a class="btn btn-default" href="{{route('conta.index',$recurrente->empresa_id)}}" title="Ir la página anterior">Volver</a>
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


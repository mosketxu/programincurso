@extends('layouts.programinlive')

@section('title','Programin-Editar Facturacion')
@section('titlePag','Editar Facturacion')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag')</p>
    @include('facturacion.navbar')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            {{-- <div class="container-fluid">
            </div> --}}
        </div>
        <section class="content">
            <div class="container-fluid">
                @livewire('facturaciondetalle',['facturacion'=>$facturacion])
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
<script>

</script>
@endpush


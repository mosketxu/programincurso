@extends('layouts.programinlive')

@section('title','Programin-Facturacion')
@section('titlePag','Facturacion')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') </p>
    @include('facturacion.navbar')
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <section class="content">
            <div class="container-fluid">
                @livewire('facturaciones')
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
<script>
//
</script>
@endpush

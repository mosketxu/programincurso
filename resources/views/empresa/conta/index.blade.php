@extends('layouts.programin')

@section('title','Programin-Go')
@section('titlePag','Conta')
@section('navbar')
@include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') {{$empresa->empresa}} <span class="small text-secondary font-weight-light"><sub>{{$empresa->nif}}</sub></span></p>
    @include('empresa.conta.navbar')
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
                <div class="col-6">
                    @include('empresa.conta.recurrente.index')        
                </div>
            </div>
            <div class="row">
                <div class="card col-6">
                    <div class="card-header" data-card-widget="collapse" style="cursor: pointer">
                        <div class="row">
                            <h3 class="card-title col">Impuestos/Obligaciones</h3>
                            <div class="card-tools text-right col">
                                <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-4">
                    Estado impuestos
                </div>
                <div class="card col-4">
                    Notas cliente
                </div>
                <div class="card col-4">
                    Ficha cliente
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
    <script>
    </script>
@endpush


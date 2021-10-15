@extends('layouts.programin')

@section('title','Programin')
@section('titlePag','Hola '. Auth::user()->name)
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    @include('layouts.partials.navbarderecha')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="text-center">
                    {{-- <div class="col-auto">
                    </div> --}}
                    <div class="h3 m-0 text-dark text-center">
                        @yield('titlePag')
                    </div>
                    {{-- <div class="col-sm-6">
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- - /.content-header --}}
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h1>Header</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <img src="{{ asset('img/contabilidad.png')}}" id="Logo" alt="Logo" style="height: 300px">
                        </div>
                    </div>
                    <div class="card-footer">
                        Footer
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
    <script>
    </script>
@endpush


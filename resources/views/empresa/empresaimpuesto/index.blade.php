@extends('layouts.programin')

@section('title','Programin-Empresa Impuestos')
@section('titlePag','Impuestos de ')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') {{$empresa->empresa}}</p>
    @include('empresa.empresaimpuesto.navbar')
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
                <div class="card p-0">
                    <!-- card-header -->
                    {{-- <div class="card-header">
                    </div> --}}
                    <!-- card-body -->
                    <div class="card-body">
                        {{-- mensajes de exito o error --}}
                        @include('layouts.partials.mensajes')
                        {{-- fin mensajes de exito o error --}}
                        <div class="table-responsive p-0 alturatabla">
                            <table class="table table-hover table-sm small table-head-fixed ">
                                <thead>
                                    <tr>
                                        <th width=10px>#</th>
                                        <th>Modelo</th>
                                        <th>Impuesto</th>
                                        <th>Ciclo</th>
                                        <th>Observaciones</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empresaimpuestos as $empresaimpuesto)
                                    <tr id="tr{{$empresaimpuesto->id}}">
                                        <td class="badge badge-default">{{$empresaimpuesto->id}}-{{$empresaimpuesto->empresa_id}}-{{$empresaimpuesto->impuesto_id}}</a></td>
                                        <td>{{$empresaimpuesto->modelo}}</td>
                                        <td>{{$empresaimpuesto->impuesto}}</td>
                                        <td>{{$empresaimpuesto->periodo_id}}</td>
                                        <td>{{$empresaimpuesto->observaciones}}</td>
                                        <form id="form{{$empresaimpuesto->id}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$empresaimpuesto->id}}" >
                                            <td>
                                            <select class="selectsinborde" name="departamento" id="departamento" onchange="update('form{{$empresaimpuesto->id}}','{{ route('empresaimpuesto.update') }}')" required aria-placeholder="departamento">
                                                @foreach($departamentos as $departamento)
                                                    <option value="{{old('departamento',$departamento->departamento)}}"  {{ $departamento->departamento == $empresaimpuesto->departamento ? 'selected' : '' }}>{{ $departamento->departamento }}</option>
                                                @endforeach
                                            </select>
                                            </td>
                                        </form>
                                        <td class="text-right m-0 pr-3">
                                            <form  id="formDelete{{$empresaimpuesto->id}}">
                                                <a href="{{route('empresaimpuesto.edit', $empresaimpuesto->id) }}" title="Editar impuesto"><i class="far fa-edit text-primary fa-lg ml-3"></i></a>
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <a href="#!" class="btn-delete " title="Eliminar" onclick="eliminar('{{route('empresaimpuesto.destroy',$empresaimpuesto->id)}}','{{$empresaimpuesto->id}}')"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- card-footer -->
                    <div class="card-footer pb-0">
                        <label for="impuesto">Selecciona impuesto 
                            @can('empresaimpuestos.create')
                            o pulsa  
                            <a href="{{route('empresaimpuesto.create',$empresa)}}">AQUÍ</a> 
                            aqui para crear uno nuevo
                            @endcan
                        </label>
                        <table class="table table-hover table-sm small table-head-fixed ">
                            <thead>
                                <tr>
                                    <th>Impuesto</th>
                                    <th>Ciclo</th>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <form method="POST" id="form" action="{{ route("empresaimpuesto.store") }}">
                                <tbody>
                                    <tr>
                                    @csrf
                                    <input type="hidden" name="empresa_id" value="{{$empresa->id}}">
                                        <td>
                                            <select class="form-control" name="impuesto_id" id="impuesto_id" >
                                                @foreach($impuestos as $impuesto)
                                                    <option value="{{$impuesto->id}}">{{$impuesto->modelo}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="ciclo_id" id="ciclo_id" >
                                                @foreach($ciclos as $ciclo)
                                                    <option value="{{$ciclo->id}}">{{$ciclo->ciclo}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="observaciones" id="observaciones">
                                        </td>
                                </tbody>
                                    <div class="form-group">
                                        <a class="btn btn-primary" href="#" onclick="form.submit()">Guardar</a>
                                        <a class="btn btn-default" href="{{route('empresaimpuesto.index',$empresa)}}" title="Ir la página anterior">Volver</a>
                                    </div>
                            </form>
                        </table>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
    <script>
        $(document).ready(function(){
            $('#impuestos').select2({
                placeholder :"Selecciona contactos",
                tags:true,
                allowClear:true,
            });
        });

    // function update(formulario,ruta) {
    //     var token= $('#token').val();

    //     $.ajaxSetup({
    //         headers: { "X-CSRF-TOKEN": $('#token').val() },
    //     });
    //     var formElement = document.getElementById(formulario);
    //     var formData = new FormData(formElement);

    //     $.ajax({
    //         type:'POST',
    //             url: ruta,
    //             data:formData,
    //             cache:false,
    //             contentType: false,
    //             processData: false,
    //             success: function(data) {
    //                 toastr.success(data[1],{
    //                 "progressBar":true,
    //                 "positionClass":"toast-top-center"
    //                 });
    //             },
    //             error: function(data){
    //                 toastr.error("No se ha actualizado el contacto",{
    //                     "closeButton": true,
    //                     "progressBar":true,
    //                     "positionClass":"toast-top-center",
    //                     "options.escapeHtml" : true,
    //                     "showDuration": "300",
    //                     "hideDuration": "1000",
    //                     "timeOut": 0,
    //                 });
    //             }
    //         });
    //     }
    </script>
@endpush


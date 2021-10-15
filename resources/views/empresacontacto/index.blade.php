@extends('layouts.programin')

@section('title','Programin-Contactos')
@section('titlePag','Contactos de ')
@section('navbar')
    @include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') {{$empresa->empresa}}</p>
    @include('empresacontacto.navbar')
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
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Tfno</th>
                                    <th>Email 1</th>
                                    <th>Email 2</th>
                                    <th width="25%;">Observaciones</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($empresacontactos as $empresacontacto)
                                    <tr id="tr{{$empresacontacto->id}}">
                                        <td class="badge badge-default">{{$empresacontacto->id}}-{{$empresacontacto->empresa_id}}-{{$empresacontacto->contacto_id}}</a></td>
                                        <td>{{$empresacontacto->empresa}}</td>
                                        <form id="form{{$empresacontacto->id}}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$empresacontacto->id}}" >
                                            <td>
                                                {{$empresacontacto->departamento}}
                                            {{--NO FUNCIONA BIEN 
                                                <select class="selectsinborde" name="departamento" id="departamento" onchange="update('form{{$empresacontacto->id}}','{{ route('empresacontacto.update') }}')" required aria-placeholder="departamento">
                                                @foreach($departamentos as $departamento)
                                                    <option value="{{old('departamento',$departamento->departamento)}}"  {{ $departamento->departamento == $empresacontacto->departamento ? 'selected' : '' }}>{{ $departamento->departamento }}</option>
                                                @endforeach
                                            </select> --}}
                                            </td>
                                        </form>
                                        <td>{{$empresacontacto->tfno}}</td>
                                        <td>{{$empresacontacto->emailgral}}</td>
                                        <td>{{$empresacontacto->emailadm}}</td>
                                        <td>{{$empresacontacto->observaciones}}</td>
                                        <td class="text-right m-0 pr-3">
                                            <form  id="formDelete{{$empresacontacto->id}}">
                                                <a href="{{route('contacto.edit', $empresacontacto->contacto_id) }}" title="Editar contacto"><i class="far fa-edit text-primary fa-lg ml-3"></i></a>
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <a href="#!" class="btn-delete " title="Eliminar" onclick="eliminar('{{route('empresacontacto.destroy',$empresacontacto->id)}}','{{$empresacontacto->id}}')"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
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
                        <form method="POST" id="form" action="{{ route("empresacontacto.store") }}">
                        @csrf
                        <input type="hidden" name="empresa_id" value="{{$empresa->id}}">
                        <label for="empresas">Selecciona contactos 
                            @can('empresacontactos.create')
                            o pulsa  
                            <a href="{{route('empresacontacto.create',$empresa)}}">AQUÍ</a> 
                            aqui para crear uno nuevo
                            @endcan
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">
                                  <a href="#" onclick="form.submit()">Guardar</a>
                                </span>
                            </div>
                            {{-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> --}}

                            <select class="form-control" name="contactos[]" id="contactos" multiple="multiple">
                                @foreach($contactos as $contacto)
                                    <option value="{{$contacto->id}}">{{$contacto->empresa}}</option>
                                @endforeach
                            </select>
    
                        </div>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{route('empresa.index')}}" title="Ir la página anterior">Volver</a>
                        </div>
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
        $('#contactos').select2({
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


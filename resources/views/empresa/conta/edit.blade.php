@extends('layouts.programin')

@section('title','Programin-Go')
@section('titlePag','Editar Asiento')
@section('navbar')
@include('layouts.partials.navbarizquierda')
    <p class="h3 pt-2 text-dark">@yield('titlePag') {{$empresa->empresa}}</p>
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
                {{-- Recibidas --}}
               @include('layouts.partials.mensajes')
               <div class="card">
                  <div class="card-header">
                     <table>
                        <thead>
                           <form id="form" action="{{route('conta.contas',[$empresa,$conta->tipo])}}" method="get">
                              <tr>
                                 <th>
                                      <select name="anyo" id="anyo" class="form-control form-control-plaintext form-control-sm">
                                          <option value="2019" {{$anyo=='2019'? 'selected' :''}}>2019</option>
                                          <option value="2020" {{$anyo=='2020'? 'selected' :''}}>2020</option>
                                          <option value="2021" {{$anyo=='2021'? 'selected' :''}}>2021</option>
                                      </select>
                                  </th>
                                  <th>
                                      <select name="periodo" id="periodo"  class="form-control form-control-plaintext form-control-sm">
                                          @foreach ($periodos as $peri)
                                          <option value="{{$peri->id}}" {{$peri->id==$periodo ? 'selected' :''}}>{{$peri->periodo}}
                                          @endforeach
                                      </select>
                                  </th>
                              </tr>
                           </form>
                        </thead>
                     </table>
                  </div>
                  <div class="card-body pt-0">
                     <form id="updateForm" method="POST" action="{{route('conta.update')}}">
                     @csrf
                     {{-- @method('PUT') --}}
                        <div class="row">
                           <input type="hidden" name="id" id="id" value={{$conta->id}}></td>
                           <input type="hidden" name="tipo" id="tipo" value={{$conta->tipo}}></td>
                           <input type="hidden" name="empresa_id" id="empresa_id" value="{{$empresa->id}}"></td>
                           <div class="form-group" style="width: 10%">
                              <label for="fechaasiento" class="col-form-label">F.Asiento</label>
                              <input class="form-control form-control-sm unstyled pr-0 m-0" type="date" name="fechaasiento" id="fechaasiento"  value="{{ old('fechaasiento',$conta->fechaasiento) }}">
                           </div>
                           <div class="form-group" style="width: 10%">
                              <label for="fechafactura" class="col-form-label">F.Factura</label>
                              <input class="form-control form-control-sm  unstyled pr-0 m-0" type="date" name="fechafactura" id="fechafactura" value="{{ old('fechafactura', $conta->fechafactura) }}">
                           </div>
                           <div class="form-group col">
                              <label for="provcli_id" class="col-form-label">Proveedor</label>
                              <select class="form-control form-control-sm"  name="provcli_id" id="provcli_id" style="width: 100%;">
                                 @foreach($provclis as $provcli)
                                 <option value="{{ $provcli->id }}" {{$provcli->id== $conta->provcli_id ? 'selected':''}}>{{ $provcli->nombre }} - {{ $provcli->id }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group"  style="width: 10%">
                              <label for="factura" class="col-form-label">Factura</label>
                              <input class="form-control form-control-sm" type="text" name="factura" id="factura" value="{{ old('factura', $conta->factura) }}">
                           </div>
                           <div class="form-group"  style="width: 10%">
                              <label for="categoria_id" class="col-form-label">Categoria</label>
                              <select class="form-control form-control-sm" name="categoria_id" id="categoria_id">
                              @foreach($categorias as $categoria)
                              <option value="{{ $categoria->id }}" {{$categoria->id==$conta->categoria_id? 'selected' :''}}>{{ $categoria->categoria }}</option>
                              @endforeach
                          </select>
                           </div>
                           <div class="form-group col">
                              <label for="concepto" class="col-form-label">Concepto</label>
                              <input class="form-control form-control-sm text-left" type="text" name="concepto" id="concepto" value="{{ old('concepto',  $conta->concepto) }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group" style="width: 10%">
                              <label for="base21" class="col-form-label">Base 21%</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text"  name="base21" id="base21" onblur="baseporiva('#base21','#iva21','0.21');" value="{{ old('base21',  number_format($conta->base21,2)) }}">
                           </div>
                           <div class="form-group col">
                              <label for="iva21" class="col-form-label">IVA 21%</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="iva21" id="iva21" value="{{ old('iva21',  number_format($conta->iva21,2)) }}">
                           </div>
                           <div class="form-group" style="width: 10%">
                           <label for="base10" class="col-form-label">Base 10% </label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="base10" id="base10" onblur="baseporiva('#base10','#iva10','0.10');" value="{{ old('base10',  number_format($conta->base10,2)) }}">
                           </div>
                           <div class="form-group col">
                              <label for="iva10" class="col-form-label">IVA 10%</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="iva10" id="iva10" value="{{ old('iva10',  number_format($conta->iva10,2)) }}">
                           </div>
                           <div class="form-group" style="width: 10%">
                              <label for="base4" class="col-form-label">Base 4%</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="base4" id="base4" onblur="baseporiva('#base4','#iva4','0.04');" value="{{ old('base4', number_format($conta->base4,2)) }}">
                           </div>
                           <div class="form-group col">
                              <label for="iva4" class="col-form-label">IVA 4%</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="iva4" id="iva4" value="{{ old('iva4', number_format($conta->iva4,2)) }}">
                           </div>
                           <div class="form-group"  style="width: 10%">
                              <label for="exento" class="col-form-label">Exento</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="exento" onblur="total();" id="exento" value="{{ old('exento', number_format($conta->exento,2)) }}">
                           </div>
                           <div class="form-group"  style="width: 10%">
                              <label for="baseretencion" class="col-form-label">B.Retención</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="baseretencion" id="baseretencion" value="{{ old('baseretencion', number_format($conta->baseretencion,2)) }}">
                           </div>
                           <div class="form-group" style="width:6%">
                              <label for="porcentajeretencion" class="col-form-label">% Ret. </label>
                              <select class="form-control form-control-sm text-right" name="porcentajeretencion" id="porcentajeretencion">
                                 <option value="0" {{$conta->porcentajeretencion=="0"? 'selected' : ''}}>0%</option>
                                 <option value="0.07" {{$conta->porcentajeretencion=="0.07"? 'selected' : ''}}>7%</option>
                                 <option value="0.15" {{$conta->porcentajeretencion=="0.15"? 'selected' : ''}}>15%</option>
                                 <option value="0.19" {{$conta->porcentajeretencion=="0.19"? 'selected' : ''}}>19%</option>
                              </select>
                           </div>
                           <div class="form-group col">
                              <label for="retencion" class="col-form-label">Retención</label>
                              <input class="form-control form-control-sm text-right unstyled" type="text" name="retencion" id="retencion" value="{{ old('retencion', number_format($conta->retencion,2)) }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <label for="totalnuevo" class="col-form-label">Total factura</label>
                              <input class="form-control form-control-sm text-right unstyled text-primary" type="text" id="totalnuevo" value="{{number_format($total,2)}}" readonly>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a id="btn_add" class="btn btn-primary" href="#" title="Actualizar">Actualizar</a>
                           {{-- <button class="btn btn-primary" type="submit">Submit</button> --}}
                        </form>
                        <a id="btn_volver" class="btn btn-default" href="#" onclick="form.submit()" title="Ir la página anterior">Volver</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
    </div>      
    @endsection

@push('scriptchosen')
    <script src="{{ asset('js/conta.js')}}"></script>
    <script>
      $("#btn_add").click(function(){
         controlfecha=controlperiodo();
         respuesta=true;
         if(controlfecha!=0){
            respuesta=confirm('El periodo no corresponde. ¿Deseas continuar?');
         }
         if (respuesta==true)
            $("#updateForm").submit();
      })    

      $("#factura").change(function(){
         empresa_id=$("#empresa_id").val();
         prov_id=$("#provcli_id").val();
         factura=$("#factura").val();
         ruta='/conta/controlfactura/'+empresa_id+'/'+prov_id+'/'+factura;
         $.get(ruta,function(data){
            if(data>0)
               alert('Esta factura ya existe para este proveedor. Verifíquela. ');
            // console.log(data);
        });
      })  
    </script>
@endpush

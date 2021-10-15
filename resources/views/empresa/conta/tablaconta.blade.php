<div id="tablaconta" class="table-responsive p-0 alturatabla">
   <table id="tablaasientos" class="table table-hover table-sm small table-head-fixed text-nowrap sortable">
       <thead>
           <tr>
               <th></th>
               {{-- <th width="4%">#</th> --}}
               <th>F.Asiento / <br>F.Fact.</th>
               <th>Proveedor</th>
               <th>NºFact.</th>
               <th>Concepto</th>
               <th>Categoria</th>
               <th class="text-right">Base 21<br>{{number_format($contas->sum('base21'),2)}}<br>{{number_format($contas->sum('iva21'),2)}}</th>
               <th class="text-right">Base 10<br>{{number_format($contas->sum('base10'),2)}}<br>{{number_format($contas->sum('iva10'),2)}}</th>
               <th class="text-right">Base 4<br>{{number_format($contas->sum('base4'),2)}}<br>{{number_format($contas->sum('iva4'),2)}}</th>
               <th class="text-right">Exento<br>{{number_format($contas->sum('exento'),2)}}</th>
               <th class="text-right">Base Ret<br>{{number_format($contas->sum('baseretencion'),2)}}<br>{{number_format($contas->sum('retencion'),2)}}</th>
               <th class={{$tipo=='R'? "d-none":"text-right"}}>Base Req<br>{{number_format($contas->sum('baserecargo'),2)}}<br>{{number_format($contas->sum('recargo'),2)}}</th>
               <th class="text-right">Total<br>{{number_format($contas->sum('base21')+$contas->sum('iva21')+$contas->sum('base10')+$contas->sum('iva10')+$contas->sum('base4')+$contas->sum('iva4')+$contas->sum('exento')-$contas->sum('retencion')+$contas->sum('recargo'),2)}}</th>
               <th></th>
           </tr>
       </thead>
       <tbody id="bodyasientos">
           @foreach($contas as $conta)
           <tr id="tr{{$conta->id}}">
                <form id="form{{$conta->id}}" action="{{route('conta.updateon')}}" method="POST">
                    @csrf
                    <td>
                        <a href="{{route('conta.edit',[$conta,$anyo,$periodo?? '17'])}}" title="Editar"><i class="far fa-edit text-primary fa-lg ml-2"></i></a>
                        {{-- <a href="#" title="Editar" onclick="form{{$conta->id}}.submit()"><i class="fas fa-check-circle text-success fa-lg ml-2"></i></a> --}}
                        <a href="#" title="Actualizar" onclick="updateon('form{{$conta->id}}')"><i class="fas fa-check-circle text-success fa-lg ml-2"></i></a>
                    </td>
                    {{-- <td class="my-0 py-0 "><input type="text" class="form-control-xs form-control-plaintext text-left mx-0 px-0" name="id" id="id" value="{{$conta->id}}" readonly></td> --}}
                    <input type="hidden" class="form-control-xs form-control-plaintext text-left mx-0 px-0" name="id" id="id" value="{{$conta->id}}">
                    <td class="my-0 py-0 ">
                        <input type="hidden" class="form-control-xs form-control-plaintext unstyled px-0 m-0" name="fechaasiento" value="{{$conta->fechaasiento}}" readonly>{{$conta->fechaasiento}}
                        <input type="hidden" class="form-control-xs form-control-plaintext unstyled px-0 m-0" name="fechafactura" value="{{$conta->fechafactura}}" readonly><br>{{$conta->fechafactura}}
                    </td>
                    {{-- <td class="my-0 py-0 "><input type="text" class="form-control-xs form-control-plaintext " name="provcli_id" id="provcli_id" value="{{$conta->provcli->nombre??$conta->provcli_id}}" readonly></td> --}}
                    <td class="my-0 py-0 "><input type="text" class="form-control-xs form-control-plaintext " name="provcli_id" id="provcli_id" value="{{$conta->nombre}}" readonly></td>
                    <td class="my-0 py-0 "><input type="text" class="form-control-xs form-control-plaintext " name="factura" id="factura" value="{{$conta->factura}}" readonly></td>
                    <td class="my-0 py-0 "><input type="text" class="form-control-xs form-control-plaintext " name="concepto" id="concepto" value="{{$conta->concepto}}" readonly></td>
                    <td class="my-0 py-0 ">
                        <select class="form-control form-control-xs selectsinborde" name="categoria_id" id="categoria_id" onchange="updateon('form{{$conta->id}}')" style="width: 100%;">
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{$categoria->id==$conta->categoria_id? 'selected' :''}}>{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-right">{{number_format($conta->base21,2)}}<br>{{number_format($conta->iva21,2)}}</td>
                    <td class="text-right">{{number_format($conta->base10,2)}}<br>{{number_format($conta->iva10,2)}}</td>
                    <td class="text-right">{{number_format($conta->base4,2)}}<br>{{number_format($conta->iva4,2)}}</td>
                    <td class="text-right">{{number_format($conta->exento,2)}}</td>
                    <td class="text-right">{{number_format($conta->baseretencion,2)}}-{{number_format($conta->porcentajeretencion,2)}}%<br>{{number_format($conta->retencion,2)}}</td>
                    <td class={{$tipo=='R'? "d-none":"text-right"}}>{{number_format($conta->baserecargo,2)}}-{{number_format($conta->porcentajerecargo,2)}}%<br>{{number_format($conta->recargo,2)}}</td>
                    <td class="text-right">{{number_format($conta->base21+$conta->iva21+$conta->base10+$conta->iva10+$conta->base4+$conta->iva4
                    +$conta->exento-$conta->retencion+$conta->recargo,2)}}</td>
                </form>
                <td  class="text-right m-0 pr-3">
                    <form  id="formDelete{{$conta->id}}">
                    @method('POST')
                    @csrf
                        <a href="#!" class="btn-delete " title="Eliminar" onclick="eliminarfila('{{$conta->id}}')"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

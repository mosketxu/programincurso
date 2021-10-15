<table class="table table-hover table-sm small table-head-fixed ">
    <thead>
        <tr>
                <th>F.Asiento / <br>F.Fact.</th>
                <th width="15%">Proveedor</th>
                <th>NºFact. / <br> Concepto</th>
                <th>Categoria</th>
                <th>Base 21 / 21%</th>
                <th>Base 10 / 10%</th>
                <th>Base 4 / 4%</th>
                <th>Exento</th>
                <th>Base Ret / <br> % Ret / Retención</th>
                <th class={{ $tipo=='R'? "d-none":""}} width="5%">Base Req</th>
                <th class={{ $tipo=='R'? "d-none":""}} width="4%">% Req</th>
                <th class={{ $tipo=='R'? "d-none":""}} width="5%">R.Equiv</th>
                <th width="10%">Total</th>
        </tr>
    </thead>
    <tbody>
        {{-- <form id="creaForm"> --}}
        <form id="creaForm" method="POST" action="{{route('conta.store')}}">
        {{-- <form id="creaForm" method="POST" action="{{route('conta.controlfactura')}}"> --}}
        @csrf
            <tr>
                <input type="hidden" name="tipo" id="tipo" value={{$tipo}}></td>
                <input type="hidden" name="empresa_id" id="empresa_id" value="{{$empresa->id}}"></td>
                <input type="hidden" name="anyo"  value="{{$anyo}}"></td>
                <input type="hidden" name="periodo" value="{{$periodo}}"></td>
                <td class="px-0"><input tabindex="1" class="focusNext form-control form-control-sm unstyled pr-0 m-0" type="date" name="fechaasiento" id="fechaasiento"  value="{{ $fechaAs }}">
                <input class="form-control form-control-sm  unstyled pr-0 m-0" type="date" name="fechafactura" id="fechafactura" value="{{ old('fechafactura', '') }}"></td>
                <td>
                   <select tabindex="2" class="focusNext form-control form-control-sm select2"  name="provcli_id" id="provcli_id" style="width: 100%;"> 
                       <option value="">-</option>
                       @foreach($provclis as $provcli)
                       <option value="{{ $provcli->id }}">{{ $provcli->nombre }} - {{ $provcli->id }}</option>
                       @endforeach
                   </select>
                </td>
                <td class="px-0">
                    <input tabindex="3" class="focusNext form-control form-control-sm" type="text" name="factura" id="factura" onchange="controlfactura('creaForm','{{ route('conta.controlfactura') }}')" value="{{ $facturanueva}}">
                    <input tabindex="4" class="focusNext form-control form-control-sm text-left" type="text" name="concepto" id="concepto" value="{{ old('concepto', '') }}">
                </td>
                <td>
                    <select tabindex="5" class="focusNext form-control form-control-sm"  name="categoria_id" id="categoria_id" style="width: 100%;">
                        <option value="">-</option>
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }} - {{ $categoria->id }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-0">
                   <input tabindex="6" class="focusNext form-control form-control-sm text-right unstyled" type="text"  name="base21" id="base21" onblur="baseporiva('#base21','#iva21','0.21');" value="{{ old('base21', '') }}">
                    <input class="form-control form-control-sm text-right unstyled" type="number" step="0.01" name="iva21" id="iva21" value="{{ old('iva21', '') }}">
                </td>
                <td class="px-0">
                    <input tabindex="7" class="focusNext form-control form-control-sm text-right unstyled" type="text" step="0.01" name="base10" onblur="baseporiva('#base10','#iva10','0.10');" id="base10" value="{{ old('base10', '') }}">
                    <input class="form-control form-control-sm text-right unstyled" type="number" step="0.01" name="iva10" id="iva10" value="{{ old('iva10', '') }}">
                </td>
                <td class="px-0">
                    <input tabindex="8" class="focusNext form-control form-control-sm text-right unstyled" type="text" step="0.01" name="base4" id="base4" onblur="baseporiva('#base4','#iva4','0.04');" value="{{ old('base4', '') }}">
                    <input class="form-control form-control-sm text-right unstyled" type="number" step="0.01" name="iva4" id="iva4" value="{{ old('iva4', '') }}">
                </td>
                <td class="px-0"><input tabindex="9" class="focusNext form-control form-control-sm text-right unstyled" type="text" step="0.01" name="exento" id="exento" onblur="total();"value="{{ old('exento', '') }}"></td>
                <td class="px-0">
                    <input tabindex="10" class="focusNext form-control form-control-sm text-right unstyled" type="text" step="0.01" name="baseretencion" id="baseretencion" value="{{ old('baseretencion', '0') }}">
                    <div class="row">
                        <div class="col-5 pr-0 mr-0">
                            <select tabindex="11" class="focusNext form-control form-control-sm text-right" name="porcentajeretencion" id="porcentajeretencion">
                                <option value="0.00" selected>0</option>
                                <option value="0.07">7</option>
                                <option value="0.15">15</option>
                                <option value="0.19">19</option>
                            </select>
                        </div>
                        <div class="col-7 pl-0 ml-0">
                            <input tabindex="12" class="focusNext form-control form-control-sm text-right unstyled" type="text" step="0.01" name="retencion" id="retencion" value="{{ old('retencion', '') }}">
                        </div>
                    </div>
                </td>
                <td class={{$tipo=='R'? "d-none px-0":"px-0"}}>
                    <input tabindex="12" class="focusNext form-control form-control-sm text-right unstyled" type="number" step="0.01" name="baserecargo" id="baserecargo" value="{{ old('baserecargo', '0') }}"><br>
                    <select tabindex="13" class="focusNext form-control form-control-sm text-right" name="porcentajerecargo" id="porcentajerecargo">
                        <option value="0.00" selected>0</option>
                        <option value="0.052">5.2</option>
                        <option value="0.014">1.4</option>
                        <option value="0.005">0.5</option>
                    </select>
                    <input tabindex="14" class="focusNext form-control form-control-sm text-right unstyled" type="number" step="0.01" name="recargo" id="recargo" value="{{ old('recargo', '') }}">
                </td>
               <td class="px-0  text-center">
                   <input class="form-control form-control-sm text-right unstyled text-primary" type="number" step="0.01" id="totalnuevo" value="" readonly>
                    <a tabindex="15" id="btn_add" class="focusNext" href="#" title="Nuevo" onclick="addline()"><i class="fas fa-plus-circle fa-2x text-primary"></i></a>
                </td>
               {{-- <td class="px-0"><input type="submit" value="a"></td> --}}
               {{-- <td><a href="{route('provcli.categoria','355')}">provcli</a></td> --}}
           </tr>
       </form>
   </tbody>
</table>

    <tr>
        <form wire:submit.prevent="save">
            <td><small>{{$facturaciondetalle->facturacion_id}}-{{$facturaciondetalle->id}}</small></td>
            <td><input wire:model="facturaciondetalle.concepto" type="text" class="form-control form-control-sm inputsinborde" name="concepto" id="concepto" autofocus required></td>
                @error('facturaciondetalle.concepto')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            <td><input wire:model="facturaciondetalle.unidades" type="text" class="form-control form-control-sm inputsinborde text-right"></td>
                @error('facturaciondetalle.unidades')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            <td><input wire:model="facturaciondetalle.coste" type="text" class="form-control form-control-sm inputsinborde  text-right"></td>
                @error('facturaciondetalle.coste')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            <td>
                <select wire:model="facturaciondetalle.iva" style="text-align-last: right;" class="form-control form-control-sm selectsinborde text-right @error('facturaciondetalle.iva') is-invalid @enderror">
                    <option value="0">0%</option>
                    <option value="0.04">4%</option>
                    <option value="0.10">10%</option>
                    <option value="0.21">21%</option>
                </select>
            </td>
            <td><span class="form-control form-control-sm font-weight-bold inputsinborde text-right" >{{number_format($facturaciondetalle->unidades * $facturaciondetalle->coste * $facturaciondetalle->iva, 2, ',', '.')}}</span></td>
            <td><span class="form-control form-control-sm font-weight-bold inputsinborde text-right" >{{number_format($facturaciondetalle->unidades * $facturaciondetalle->coste *  (1+ $facturaciondetalle->iva), 2, ',', '.')}}</span></td>
            <td><div >
                <select wire:model="facturaciondetalle.subcuenta" style="text-align-last: right;" class="form-control form-control-sm selectsinborde  @error('facturaciondetalle.subcuenta') is-invalid @enderror">
                    <option value="">-- Selecciona cuenta --</option>
                    <option value="705000">705000</option>
                    <option value="759000">759000</option>
                </select></div>
            </td>
            <td><input wire:model="facturaciondetalle.suplido" type="checkbox" value="1" class="ml-4"/></td>
            <td>
                <select wire:model="facturaciondetalle.pagadopor" style="text-align-last: right;" class="form-control form-control-sm selectsinborde text-right @error('facturaciondetalle.pagadopor') is-invalid @enderror">
                    <option value="">-- Selecciona cuenta --</option>
                    <option value="0">Marta</option>
                    <option value="1">Susana</option>
                </select>
            </td>
            <td>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="#" onclick="return confirm('¿Estás seguro?') || event.stopImmediatePropagation()"
                    wire:click="delete('{{$facturaciondetalle->id}}')"
                        class="btn-delete " title="Eliminar" ><i class="far fa-trash-alt text-danger fa-lg ml-1"></i>
                </a>

            </td>
        </form>
    </tr>

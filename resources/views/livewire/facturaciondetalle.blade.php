<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col-3 text-info">Empresa:</div>
                    <div class="col-9">{{$facturacion->empresa}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-info">Nº Factura:</div>
                    <div class="col-9"><span class="badge badge-primary">{{$facturacion->id}}</span> {{$facturacion->factura}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-info">F.Factura:</div>
                    <div class="col-9"> {{$facturacion->fechafactura}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-info">F.Vto:</div>
                    <div class="col-9">{{$facturacion->fechavto}}</div>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-3 text-info">Total €: </div>
                    <div class="col-9">{{number_format($facturacion->getTotal(),2,',','.')}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-info">Cond.Pago: </div>
                    <div class="col-9">{{$facturacion->condpago->condpagocorto}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-info">Cuenta:</div>
                    <div class="col-9">{{$facturacion->subcuenta}}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-info">Refcliente:</div>
                    <div class="col-9">{{$facturacion->refcliente}}</div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4"><span class="text-info">Mail:</span> {{$facturacion->emailconta}}</div>
                    <div class="col-4"><span class="text-info">Enviar mail:</span>@if($facturacion->enviarmail===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</div>
                    <div class="col-4"><span class="text-info">Enviado:</span> @if($facturacion->mailenviado===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</div>
                </div>
                <div class="row">
                <div class="col-4"><span class="text-info">Contab.:</span> @if($facturacion->contabilizado===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</div>
                <div class="col-4"><span class="text-info">F.Conta.:</span> {{$facturacion->fechacontabilizado}} </div>
                <div class="col-4"><span class="text-info">Pagado:</span> @if($facturacion->pagada===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm small table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center" width="35%">Concepto</th>
                        <th width="5%" class="text-right pr-2">Uds.</th>
                        <th width="5%" class="text-right pr-2">Coste</th>
                        <th class="text-right pr-2">Iva %</th>
                        <th class="text-right pr-2">Iva</th>
                        <th class="text-right pr-2">Subtotal</th>
                        <th class="text-right pr-4">Subcuenta</th>
                        <th class="text-center">Suplido</th>
                        <th class="text-right pr-4">Pagado por</th>
                        <th class="text-center">op.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($facturacion->facturaciondetalles as $facturaciondetalle)
                        @livewire('facturaciondetalle-edit',['facturaciondetalle'=>$facturaciondetalle])
                        {{-- <tr>
                            <td><small>{{$facturaciondetalle->facturacion_id}}-{{$facturaciondetalle->id}}</small></td>
                            <td>{{$facturaciondetalle->concepto}}</td>
                            <td>{{$facturaciondetalle->unidades}}</td>
                            <td>{{$facturaciondetalle->coste}}</td>
                            <td>{{$facturaciondetalle->iva *100}} %</td>
                            <td><span class="form-control form-control-sm font-weight-bold inputsinborde text-right" >{{number_format($facturaciondetalle->unidades * $facturaciondetalle->coste * $facturaciondetalle->iva, 2, ',', '.')}}</span></td>
                            <td><span class="form-control form-control-sm font-weight-bold inputsinborde text-right" >{{number_format($facturaciondetalle->unidades * $facturaciondetalle->coste *  (1+ $facturaciondetalle->iva), 2, ',', '.')}}</span></td>
                            <td>{{$facturaciondetalle->subcuenta}}</td>
                            <td>@if($facturacion->suplido===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</td>
                            <td>{{$facturacion->pagadopor===0 ? 'Marta' : 'Susana'}}</td>
                            <td>
                                <a wire:click.prevent="editDetalle({{$facturaciondetalle->id}})" href="#" title="Editar"><i class="far fa-edit text-primary fa-lg ml-2"></i></a>
                                <a href="#" onclick="return confirm('¿Estás seguro?') || event.stopImmediatePropagation()"
                                    wire:click="deleteFacturacionDetalle('{{$facturaciondetalle->id}}')"
                                        class="btn-delete " title="Eliminar" ><i class="far fa-trash-alt text-danger fa-lg ml-1"></i>
                                </a>

                            </td>
                        </tr> --}}

                    @empty
                    <tr colspan=14>
                        <th colspan="14">
                            No hay
                        </th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>



  <!-- Modal Facturacion-->
    {{-- <div class="modal "  @if ($showEditFacturacionModal) style="display:block" @endif>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Facturacion</h5>
                        <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input wire:model="facturacion.id" type="hidden" class="form-control form-control-sm" >
                            <div class="col">
                                <div class="text-sm font-weight-bold">Empresa</div>
                                <div class="text-sm font-weight-bold">
                                    <select wire:model="facturacion.empresa_id" class="form-control form-control-sm @error('facturacion.empresa_id') is-invalid @enderror"
                                        autofocus required>
                                        <option value="">-- choose category --</option>
                                        @foreach ($empresasas as $empresa)
                                            <option value="{{ $empresa->id }}">{{ $empresa->empresa }}</option>
                                        @endforeach
                                    </select>
                                    @error('facturacion.empresa_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-sm font-weight-bold">Factura {{$facturacion->id ? 'disabled' : 'no'  }}</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.factura" id="factura" type="text" class="form-control form-control-sm @error('facturacion.factura') is-invalid @enderror"
                                    {{$showDisabled}}>
                                    @error('facturacion.factura') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-sm font-weight-bold">F.Factura</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.fechafactura" id="fechafactura" type="date" class="form-control form-control-sm unstyled @error('facturacion.fechafactura') is-invalid @enderror" required>
                                    @error('facturacion.fechafactura') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-sm font-weight-bold">F.Vto</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.fechavto" id="fechavto" type="date" class="form-control form-control-sm unstyled @error('facturacion.fechavto') is-invalid @enderror">
                                    @error('facturacion.fechavto') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-sm font-weight-bold">C.Pago</div>
                                <div class="text-sm font-weight-bold">
                                    <select wire:model="facturacion.condpago_id" class="form-control form-control-sm @error('facturacion.condpago_id') is-invalid @enderror">
                                        <option value="">-- choose category --</option>
                                        @foreach ($condiciones as $condicion)
                                            <option value="{{ $condicion->id }}">{{ $condicion->condpagocorto }}</option>
                                        @endforeach
                                    </select>
                                    @error('facturacion.condpago_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <div class="text-sm font-weight-bold">Cuenta</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.subcuenta" id="subcuenta" type="text" class="form-control form-control-sm @error('facturacion.subcuenta') is-invalid @enderror">
                                    @error('facturacion.subcuenta') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="text-sm font-weight-bold">F.Conta</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.fechacontabilizado" id="fechacontabilizado" type="date" class="form-control form-control-sm unstyled @error('facturacion.fechacontabilizado') is-invalid @enderror" {{$showDisabled}}>
                                    @error('facturacion.fechacontabilizado') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="text-sm font-weight-bold">Ref.</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.refcliente" id="refcliente" type="text" class="form-control form-control-sm @error('facturacion.refcliente') is-invalid @enderror">
                                    @error('facturacion.refcliente') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-sm font-weight-bold">Email</div>
                                <div class="text-sm font-weight-bold">
                                    <input wire:model="facturacion.emailconta" id="emailconta" type="text" class="form-control form-control-sm @error('facturacion.emailconta') is-invalid @enderror">
                                    @error('facturacion.emailconta') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <input wire:model="facturacion.enviarmail" type="checkbox" value="1" /> Enviar mail
                                        @error('facturacion.enviarmail')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-6">
                                        <input wire:model="facturacion.mailenviado" type="checkbox" value="1" {{$showDisabled}}/> Mail Enviado
                                        @error('facturacion.mailenviado')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input wire:model="facturacion.contabilizado" type="checkbox" value="1" {{$showDisabled}} /> Contabilizado
                                        @error('facturacion.contabilizado')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-6">
                                        <input wire:model="facturacion.pagada" type="checkbox" value="1" {{$showDisabled}}/> Pagada
                                        @error('facturacion.pagada')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
{{-- </div> --}}

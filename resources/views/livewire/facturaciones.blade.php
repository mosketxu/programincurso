<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <form>
                    <div class="form-row align-items-center">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-sm">Empresa</div>
                                </div>
                                <input wire:model="filtroEmpresa" type="text" class="form-control form-control-sm"  placeholder="Empresa">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-sm">Año</div>
                                </div>
                                <input wire:model="filtroAnyo" type="text" class="form-control form-control-sm"  placeholder="Empresa">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-sm">Mes</div>
                                </div>
                                <input wire:model="filtroMes" type="text" class="form-control form-control-sm"  placeholder="Mes">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-sm">NºFactura</div>
                                </div>
                                <input wire:model="filtroFactura" type="text" class="form-control form-control-sm"  placeholder="NºFactura">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-3 small">Contab.</div>
                                <div class="col-9 small">
                                    @foreach (\App\Facturacion::CONDICIONES_LIST as $key => $value)
                                        <div class="form-check form-check-inline">
                                            <input wire:model="filtroConta" type="radio" class="form-check-input" value="{{ $key }}">
                                            <label class="form-check-label small">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 small">Enviado</div>
                                <div class="col-9 small">
                                    @foreach (\App\Facturacion::CONDICIONES_LIST as $key => $value)
                                        <div class="form-check form-check-inline">
                                            <input wire:model="filtroEnviado" type="radio" class="form-check-input" value="{{ $key }}">
                                            <label class="form-check-label small">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 small">Pagado</div>
                                <div class="col-9 small">
                                    @foreach (\App\Facturacion::CONDICIONES_LIST as $key => $value)
                                        <div class="form-check form-check-inline">
                                            <input wire:model="filtroPagado" type="radio" class="form-check-input" value="{{ $key }}">
                                            <label class="form-check-label small">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 mb-2 pb-2" style="max-width: 3%;">
                            @can('facturaciones.create')
                                <a wire:click="create" href="#"><i class="fas fa-plus-circle fa-2x text-primary mt-2"></i></a>
                            @endcan
                        </div>
                        <div class="col-11 mt-2 row small">
                            {{ $facturaciones->links() }} &nbsp; &nbsp; {{$facturaciones->total()}} facturas.
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                {{-- <div wire:loading class="text-success" >
                    Loading data...
                </div> --}}
                <div class="table-responsive p-0 ">
                    <table class="table table-hover table-sm small table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th><a wire:click="sortBy('id')" href="#" class=" text-gray"><i class="fas fa-arrows-alt-v"></i> #</a></th>
                                <th><a wire:click="sortBy('empresa')" href="#" class=" text-gray"><i class="fas fa-arrows-alt-v"></i> Empresa</a></th>
                                <th><a wire:click="sortBy('factura')" href="#" class=" text-gray"><i class="fas fa-arrows-alt-v"></i> Nº Factura</a></th>
                                <th><a wire:click="sortBy('fechafactura')" href="#" class=" text-gray"><i class="fas fa-arrows-alt-v"></i> F.Factura</a></th>
                                <th><a wire:click="sortBy('fechavto')" href="#" class=" text-gray"><i class="fas fa-arrows-alt-v"></i> F.Vto</a></th>
                                <th class="text-right pr-4">Total €</th>
                                <th>Cond.Pago</th>
                                <th>Cuenta</th>
                                <th>Enviar mail</th>
                                <th>Email</th>
                                <th>Refcliente</th>
                                <th>Enviado</th>
                                <th>Conta</th>
                                <th>F.Conta</th>
                                <th>Pagado</th>
                                <th></th>
                            </tr>
                       </thead>
                       <tbody>
                        @forelse($facturaciones as $facturacion)
                        <form wire:submit.prevent="save">
                            {{-- <tr wire:loading.class="text-info"> --}}
                            <tr>
                                <td><a href="#" wire:click="$toggle('muestraDetalle')"><i class="fas fa-plus fa text-primary text-white mr-2"></i>{{$facturacion->id}}</a></td>
                                <td>{{$facturacion->empresa}}</td>
                                <td>{{$facturacion->factura}}</td>
                                <td>{{$facturacion->fechafactura}}</td>
                                <td>{{$facturacion->fechavto}}</td>
                                <td class="text-right pr-4">{{$facturacion->getTotal()}}</td>
                                <td>{{$facturacion->condpago->condpagocorto}}</td>
                                <td>{{$facturacion->subcuenta}}</td>
                                <td>@if($facturacion->enviarmail===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</td>
                                <td>{{$facturacion->emailconta}}</td>
                                <td>{{$facturacion->refcliente}}</td>
                                <td>@if($facturacion->mailenviado===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</td>
                                <td>@if($facturacion->contabilizado===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</td>
                                <td>{{$facturacion->fechacontabilizado}}</td>
                                <td>@if($facturacion->pagada===1) <i class='fas fa-check text-success'></i> @else <i class='fas fa-times text-red'></i>@endif</td>
                                <td>
                                    <a wire:click.prevent="edit({{$facturacion->id}})" href="#" title="Editar"><i class="far fa-edit text-primary fa-lg ml-2"></i></a>
                                    <a href="{{ route('facturacion.edit', $facturacion) }}" title="Editar"><i class="fab fa-wpforms text-success fa-lg ml-2"></i></a>
                                    <a href="#" onclick="return confirm('¿Estás seguro?') || event.stopImmediatePropagation()"
                                        wire:click="deleteFacturacion('{{$facturacion->id}}')"
                                        class="btn-delete " title="Eliminar" ><i class="far fa-trash-alt text-danger fa-lg ml-2"></i>
                                    </a>
                                </td>
                            </tr>
                        </form>
                            @if($muestraDetalle)
                                @forelse ($facturacion->facturaciondetalles as $facturaciondetalle)
                                <tr class="border-0">
                                    <td colspan="14" class="border-0 my-0 py-0">
                                        <div class="card mb-0">
                                            @if ($loop->first)
                                            <div class="card-header py-1">
                                                <div class="row font-weight-bold colorfondo2">
                                                    <div class="col">#</div>
                                                    <div class="col-3">Concepto</div>
                                                    <div class="col-1 text-right">Uds.</div>
                                                    <div class="col-1 text-right">Coste</div>
                                                    <div class="col-1 text-right">Iva %</div>
                                                    <div class="col-1 text-right">Iva</div>
                                                    <div class="col-1 text-right">Subtotal</div>
                                                    <div class="col-1">Subcuenta</div>
                                                    <div class="col-1">Suplido</div>
                                                    <div class="col-1">Pagado por</div>
                                                    <div class="col"></div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body py-1">
                                                <div class="row">
                                                <div class="col">{{$facturaciondetalle->id}}</div>
                                                    <div class="col-3">{{$facturaciondetalle->concepto}}</div>
                                                    <div class="col-1 text-right">{{$facturaciondetalle->unidades}}</div>
                                                    <div class="col-1 text-right">{{$facturaciondetalle->coste}}</div>
                                                    <div class="col-1 text-right">{{$facturaciondetalle->iva * 100}} %</div>
                                                    <div class="col-1 text-right">{{$facturaciondetalle->unidades * $facturaciondetalle->coste * $facturaciondetalle->iva}}</div>
                                                    <div class="col-1 text-right">{{$facturaciondetalle->unidades * $facturaciondetalle->coste *  (1+ $facturaciondetalle->iva) }}</div>
                                                    <div class="col-1">{{$facturaciondetalle->subcuenta}}</div>
                                                    <div class="col-1">{{$facturaciondetalle->suplido}}</div>
                                                    <div class="col-1">{{$facturaciondetalle->pagadopor===0 ? 'Marta' : 'Susana'}}</div>
                                                    <div class="col">
                                                        <a wire:click.prevent="editDetalle({{$facturaciondetalle->id}})" href="#" title="Editar"><i class="far fa-edit text-primary fa-lg ml-2"></i></a>
                                                        <a href="#" onclick="return confirm('¿Estás seguro?') || event.stopImmediatePropagation()"
                                                            wire:click="deleteFacturacionDetalle('{{$facturaciondetalle->id}}')"
                                                                class="btn-delete " title="Eliminar" ><i class="far fa-trash-alt text-danger fa-lg ml-1"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr colspan=14>
                                    <th colspan="14">
                                        No hay
                                    </th>
                                </tr>
                                @endforelse
                            @endif
                        @empty
                            <tr>
                                <td colspan="3">No hay facturaciones.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal Facturacion-->
    <div class="modal "  @if ($showEditFacturacionModal) style="display:block" @endif>
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
    </div>
</div>

      <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('conta.index',$empresa) }}" class="nav-link" title="Go">Go</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('conta.contas',[$empresa,'E']) }}" class="nav-link" title="Recibidas">Emitidas</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('conta.contas',[$empresa,'R']) }}" class="nav-link" title="Recibidas">Recibidas</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      
      @if(explode(".", Route::currentRouteName())[1]!='edit')
      {{-- <form class="form-inline ml-3" method="GET" action="{{route('conta.contas',[$empresa,''])}}">
        <li>
          <div class="input-group input-group-sm">
            <input type="search" name="busca" value='{{$busqueda}}' class="form-control form-control-navbar"  placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i>
                </button>
            </div>
          </div>
        </li>
      </form> --}}
      @endif
    <!-- Previous -->
      <li class="nav-link">
        <a href="{{url()->previous()}}" title="Volver atrás"><i class="fas fa-backward fa-2x"></i></a>
      </li>
    </ul>
  </nav>
  

   <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
      @if(explode(".", Route::currentRouteName())[1]!='create')
        <!-- Left navbar links -->
      <ul class="navbar-nav">
        {{-- @if(explode(".", Route::currentRouteName())[1]=='edit') --}}
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('conta.index',$empresa) }}" class="nav-link" title="Empresa Go">Go</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('empresa.index') }}" class="nav-link" title="Editar empresa">Empresas</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('empresaimpuesto.index',$empresa) }}" class="nav-link" title="Impuestos">Impuestos</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('empresa.edit', $empresa) }}" class="nav-link" title="Editar empresa">Editar</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('empresacontacto.show', $empresa) }}" class="nav-link" title="Contacto de la empresa">Contactos</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('pu.show', $empresa) }}" class="nav-link" title="Contacto de la empresa">Pus</a>
        </li>
      </ul>
      @endif
      @if(explode(".", Route::currentRouteName())[1]=='show')
      <li class="nav-link">
        <form class="form-inline ml-3" method="GET" action="{{route('empresacontacto.show',$empresa->id)}}">
          <div class="input-group input-group-sm">
            <input type="search" name="busca" value='{{$busqueda}}' class="form-control form-control-navbar"  placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit"> 
                <i class="fas fa-search"></i>
                </button>
              </div>
          </div>
        </form>
      </li>
      @endif
    <!-- Previous -->
    <li class="nav-link">
      <a href="{{url()->previous()}}" title="Volver atrás"><i class="fas fa-backward fa-2x"></i></a>
    </li>
  </ul>
</nav>
  

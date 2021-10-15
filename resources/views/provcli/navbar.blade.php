    <!-- Left navbar links -->
  <ul class="navbar-nav ml-auto">
    @if(explode(".", Route::currentRouteName())[1]=='index')
      <li class="nav-link">
        <form class="form-inline ml-3" method="GET" action="{{route(Route::currentRouteName())}}">
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

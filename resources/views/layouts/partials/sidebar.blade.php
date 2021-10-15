<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{route('home')}}" class="brand-link">
     <img src="{{ asset('img/logoProgramin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
     <span class="brand-text font-weight-light">Programin</span>
   </a>

   <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="user-panel nav-item has-treeview">
          <a href="#" class="nav-link">
            <img src="{{ asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            <p>
              &nbsp; {{Auth::user()->name}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mi perfil</p>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log out</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- Empresas --}}
        <li class="nav-item">
          <a href="{{route('empresa.index')}}" class="nav-link {{(request()->segment(1)=='empresa') ? 'active' : ''}}">
            <i class="nav-icon far fa-building"></i>
            <p> Empresas</p>
          </a>
        </li>
        {{-- Contactos --}}
        <li class="nav-item">
          <a href="{{route('contacto.index')}}" class="nav-link {{(request()->segment(1)=='contacto') ? 'active' : ''}}">
            <i class="nav-icon fas fa-users"></i>
            <p> Contactos</p>
          </a>
        </li>
        {{-- Prov Cli --}}
        <li class="nav-item">
          <a href="{{route('provcli.index')}}" class="nav-link {{(request()->segment(1)=='nombre') ? 'active' : ''}}">
            <i class="nav-icon fas fa-users-cog"></i>
            <p> Prov/Cli</p>
          </a>
        </li>
        {{-- Facturacion --}}
        <li class="nav-item">
            <a href="{{route('facturacion.index')}}" class="nav-link {{(request()->segment(1)=='facturacion') ? 'active' : ''}}">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p> Facturacion</p>
            </a>
            </li>

     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

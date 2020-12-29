<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-speedometer"></i> Autoridad Academica</a>
            </li>
            <li class="nav-title">
                Menú
            </li>

           
            <li class="nav-item">
            <a class="nav-link" href="{{url('asistencias')}}"><i class="fa fa-list"></i> Asistencias</a>
            </li>
              
    
            {{-- <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Materias  </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-users"></i> Reportes de asistencia</a>
            </li>
                 --}}
            
            <li class="nav-item">
            <a class="nav-link" href="{{url('personalacademico')}}"><i class="fa fa-users"></i> Personal Academico</a>
            </li>
            {{-- @if (Auth::check())
                @if(Auth::user()->nombre == 'Jhimy')
                    <li class="nav-item">
                    <a class="nav-link" href="{{url(config(roles->first()->rol))}}"><i class="fa fa-user"></i>Asistencias</a>
                    </li>
                @endif
            @endif --}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
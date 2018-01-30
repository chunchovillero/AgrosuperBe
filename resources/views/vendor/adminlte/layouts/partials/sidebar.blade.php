<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                   
                </div>
            </div>
        @endif



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
           
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('paginas') }}"><i class='fa fa-link'></i> <span>Paginas</span></a></li>
            <li><a href="{{ url('galerias') }}"><i class='fa fa-link'></i> <span>Galeria de videos</span></a></li>
            <li><a href="{{ url('evaluar') }}"><i class='fa fa-link'></i> <span>Resultado Evaluaciones</span></a></li>
            <li><a href="{{ url('buzon') }}"><i class='fa fa-link'></i> <span>Resultado Buzon</span></a></li>
            <li><a href="{{ url('registros') }}"><i class='fa fa-link'></i> <span>Registro de visitas por paginas</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

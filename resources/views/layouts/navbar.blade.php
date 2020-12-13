<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/')}}" class="logo logo-large"><img src="{{asset('assets/images/logo.svg')}}" class="img-fluid" alt="logo"></a>
            <a href="{{url('/')}}" class="logo logo-small"><img src="{{asset('assets/images/small_logo.svg')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                {{-- <li>
                    <a href="{{url('/widgets')}}">
                        <img src="assets/images/svg-icon/widgets.svg" class="img-fluid" alt="widgets"><span>Widgets</span><span class="badge badge-success pull-right">New</span>
                    </a>
                </li> --}}  
                <li>
                    <a href="{{url('cliente')}}">
                        <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>Gestionar Cliente</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets/images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="ecommerce"><span>Gestionar Herramientas</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('categoria')}}">Gestionar Categoria</a></li>
                        <li><a href="{{url('maquinaria')}}">Gestionar Maquinaria</a></li>
                    </ul>
                </li>                
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets/images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="ecommerce"><span>Gestionar <br> Movimientos</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('alquiler')}}">Gestionar Alquiler</a></li>
                        <li><a href="{{url('devolucion')}}">Gestionar Devolución</a></li>
                    </ul>
                </li>      
                <li>
                    <a href="javaScript:void();">
                        <img src="{{asset('assets/images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="ecommerce"><span>Gestionar <br> Personal</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('personal')}}">Gestionar Personal</a></li>
                    </ul>
                </li>                                       
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<div id="kt_header" class="header header-fixed">
    <div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-submenu menu-item-rel">
                            <a href="{{ route('dashboard') }}" class="menu-link">
                                <span class="menu-text">Dashboard</span>
                                <i class="menu-arrow"></i>
                            </a>
{{--                        </li>--}}
{{--                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click"--}}
{{--                            aria-haspopup="true">--}}
{{--                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                <span class="menu-text">Proyectos</span>--}}
{{--                                <span class="menu-desc"></span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                            </a>--}}
{{--                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">--}}
{{--                                <ul class="menu-subnav">--}}
{{--                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                        <a href="{{ route('proyectos.create') }}" class="menu-link">--}}
{{--                                           <span class="svg-icon menu-icon">--}}
{{--                                                  <i class="fa flaticon-edit-1"></i>--}}
{{--                                           </span>--}}
{{--                                            <span class="menu-text"> Nuevo</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                        <a href="{{ route('proyectos.registered') }}" class="menu-link">--}}
{{--                                           <span class="svg-icon menu-icon">--}}
{{--                                                  <i class="fa fa-th-list"></i>--}}
{{--                                           </span>--}}
{{--                                            <span class="menu-text"> Registrados</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                        <a href="{{ route('proyectos.assigned') }}" class="menu-link">--}}
{{--                                          <span class="svg-icon menu-icon">--}}
{{--                                              <i class="fa fa-list-alt"></i>--}}
{{--                                          </span>--}}
{{--                                            <span class="menu-text"> Asignados</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item menu-item-submenu menu-item-rel">--}}
{{--                            <a href="{{ route('entregables.assigned') }}" class="menu-link">--}}
{{--                                <span class="menu-text">Entregables</span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click"--}}
{{--                            aria-haspopup="true">--}}
{{--                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                <span class="menu-text">Actividades</span>--}}
{{--                                <span class="menu-desc"></span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu menu-submenu-classic menu-submenu-left">--}}
{{--                                <ul class="menu-subnav">--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                            <span class="svg-icon menu-icon">--}}
{{--                                                  <i class="fa flaticon-edit-1"></i>--}}
{{--                                            </span>--}}
{{--                                            <span class="menu-text">Nuevo</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right" data-hor-direction="menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="{{ route('actividades.create') }}" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Actividad Efectivo</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="{{ route('actividades-secretaria.create') }}" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Actividad Secretaría</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                            <span class="svg-icon menu-icon">--}}
{{--                                                  <i class="fa fa-th-list"></i>--}}
{{--                                            </span>--}}
{{--                                            <span class="menu-text">Bandeja</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right" data-hor-direction="menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="{{ route('actividades.index') }}" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Actividad Efectivo</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="{{ route('actividades-secretaria.index') }}" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Actividad Secretaría</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        @if(auth()->user()->isAdministrator())--}}
                            <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click"
                            aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">Mantenimiento</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="#" class="menu-link">
                                           <span class="svg-icon menu-icon">
                                                  <i class="fa fa-users"></i>
                                           </span>
                                            <span class="menu-text"> Usuarios</span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('admin.role.index') }}" class="menu-link">
                                           <span class="svg-icon menu-icon">
                                                  <i class="fa fa-universal-access"></i>
                                           </span>
                                            <span class="menu-text"> Roles</span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('admin.permission.index') }}" class="menu-link">
                                           <span class="svg-icon menu-icon">
                                                  <i class="fa fa-key"></i>
                                           </span>
                                            <span class="menu-text"> Permisos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
{{--                        @endif--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

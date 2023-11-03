<div class="aside aside-left d-flex flex-column" id="kt_aside">

    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-9">
        <div class="btn p-0 symbol symbol-40 symbol-success" href="?page=index" id="kt_quick_user_toggle">

            <div class="symbol-label">
                <img alt="Logo" src="{{ config('app.url_foto_personal_saga') }}/{{ Auth::user()->basica->foto_saga }}"
                     class="h-75 align-self-end"/>
            </div>
        </div>
    </div>

    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pb-10">
        <ul class="nav flex-column">
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Dashboard">
                <a href="{{ route('dashboard') }}" class="nav-link btn btn-icon btn-lg btn-borderless active">
                    <span class="svg-icon svg-icon-xxl">

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path
                                    d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                    fill="#000000"/>
                            </g>
                        </svg>

                    </span>
                </a>
            </li>
            @if(auth()->user()->isAdministrator())

                <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="Usuarios Registrados">
                    <a href="{{ route('admin.usuarios.index') }}" class="nav-link btn btn-icon btn-lg btn-borderless">
                        <span class="svg-icon svg-icon-xxl">
                           <i class="fa fa-users"></i>
                        </span>
                    </a>
                </li>
                <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="Roles del sistema">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link btn btn-icon btn-lg btn-borderless">
                    <span class="svg-icon menu-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path
                                    d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z"
                                    fill="#000000"/>
                            </g>
                        </svg>
                    </span>
                    </a>
                </li>
                <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="Permisos del sistema">
                    <a href="{{ route('admin.permisos.index') }}" class="nav-link btn btn-icon btn-lg btn-borderless">
                     <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M10.9,2 C11.4522847,2 11.9,2.44771525 11.9,3 C11.9,3.55228475 11.4522847,4 10.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,16 C20,15.4477153 20.4477153,15 21,15 C21.5522847,15 22,15.4477153 22,16 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L10.9,2 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M24.0690576,13.8973499 C24.0690576,13.1346331 24.2324969,10.1246259 21.8580869,7.73659596 C20.2600137,6.12944276 17.8683518,5.85068794 15.0081639,5.72356847 L15.0081639,1.83791555 C15.0081639,1.42370199 14.6723775,1.08791555 14.2581639,1.08791555 C14.0718537,1.08791555 13.892213,1.15726043 13.7542266,1.28244533 L7.24606818,7.18681951 C6.93929045,7.46513642 6.9162184,7.93944934 7.1945353,8.24622707 C7.20914339,8.26232899 7.22444472,8.27778811 7.24039592,8.29256062 L13.7485543,14.3198102 C14.0524605,14.6012598 14.5269852,14.5830551 14.8084348,14.2791489 C14.9368329,14.140506 15.0081639,13.9585047 15.0081639,13.7695393 L15.0081639,9.90761477 C16.8241562,9.95755456 18.1177196,10.0730665 19.2929978,10.4469645 C20.9778605,10.9829796 22.2816185,12.4994368 23.2042718,14.996336 L23.2043032,14.9963244 C23.313119,15.2908036 23.5938372,15.4863432 23.9077781,15.4863432 L24.0735976,15.4863432 C24.0735976,15.0278051 24.0690576,14.3014082 24.0690576,13.8973499 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(15.536799, 8.287129) scale(-1, 1) translate(-15.536799, -8.287129) "/>
                                </g>
                            </svg>
                        </span>
                    </a>
                </li>
            @endif


            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Proyectos">
                <a href="{{ route('proyectos.create') }}" class="nav-link btn btn-icon btn-lg btn-borderless">
                    <span class="svg-icon svg-icon-xxl">
                       <i class="fa fa-project-diagram"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Entregables">
                <a href="{{ route('entregables.assigned') }}" class="nav-link btn btn-icon btn-lg btn-borderless">
                    <span class="svg-icon svg-icon-xxl">
                        <i class="fa fa-tasks"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item mb-2" data-toggle="tooltip" data-placement="right" data-container="body"
                data-boundary="window" title="Actividades">
                <a href="{{ route('actividades.create') }}" class="nav-link btn btn-icon btn-lg btn-borderless">
                    <span class="svg-icon svg-icon-xxl">
                        <i class="fa fa-chart-bar"></i>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-8">
        <a href="#" class="btn btn-icon btn-lg btn-borderless mb-1 position-relative" id="kt_quick_notifications_toggle"
           data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"
           title="Notifications">
            <span class="svg-icon svg-icon-xxl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path
                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                            fill="#000000" fill-rule="nonzero"/>
                        <path
                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                            fill="#000000" opacity="0.3"/>
                    </g>
                </svg>
            </span>
            <span
                class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1">3</span>
        </a>
    </div>
</div>

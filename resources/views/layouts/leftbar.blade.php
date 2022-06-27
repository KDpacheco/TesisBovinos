<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <div class="vertical-menu-icon">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="logobar">
                        <a href="{{url('/')}}" class="logo logo-small"><img
                                src="{{ asset('assets/images/banner2.svg')}}" class="img-fluid" alt="logo"></a>
                    </div>
                    <a class="nav-link active" id="v-pills-crm-tab" data-toggle="pill" href="#v-pills-crm" role="tab"
                        aria-controls="v-pills-crm" aria-selected="true"><img
                            src="{{ asset('assets/images/svg-icon/home1.svg') }}" class="img-fluid" alt="CRM"
                            data-toggle="tooltip" data-placement="top" title="INICIO"></a>
                    <a class="nav-link" id="v-pills-ecommerce-tab" data-toggle="pill" href="#v-pills-ecommerce"
                        role="tab" aria-controls="v-pills-ecommerce" aria-selected="false"><img
                            src="{{ asset('assets/images/svg-icon/insertar.svg') }}" class="img-fluid" alt="eCommerce"
                            data-toggle="tooltip" data-placement="top" title="INGRESOS"></a>
                    <a class="nav-link" id="v-pills-hospital-tab" data-toggle="pill" href="#v-pills-hospital" role="tab"
                        aria-controls="v-pills-hospital" aria-selected="false"><img
                            src="{{ asset('assets/images/svg-icon/ventas.svg') }}" class="img-fluid" alt="Hospital"
                            data-toggle="tooltip" data-placement="top" title="VENTAS"></a>

                    <a class="nav-link" id="v-pills-pages-tab" data-toggle="pill" href="#v-pills-pages" role="tab"
                        aria-controls="v-pills-pages" aria-selected="false"><img
                            src="{{ asset('assets/images/svg-icon/pdf.svg') }}" class="img-fluid" alt="Pages"
                            data-toggle="tooltip" data-placement="top" title="REPORTES"></a>
                </div>
            </div>
            <div class="vertical-menu-detail">
                <div class="logobar">
                    <a href="{{url('/')}}" class="logo logo-large"><img src="{{ asset('assets/images/logo2.svg')}}"
                            class="img-fluid" alt="logo"></a>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-crm" role="tabpanel"
                        aria-labelledby="v-pills-crm-tab">
                        <ul class="vertical-menu">
                            <li>
                                <h5 class="menu-title">Sistema Registro de Bovinos</h5>
                            </li>
                            <li><a href="{{url('/home')}}"><img src="{{asset('assets/images/svg-icon/dashboard.svg') }}"
                                        class="img-fluid" alt="dashboard">Inicio</a></li>
                            <li><a href="{{url('/analisis')}}"><img
                                        src="{{ asset('assets/images/svg-icon/reports.svg') }}" class="img-fluid"
                                        alt="projects">Analisis</a></li>
                            <li><a href="{{url('/estado')}}"><img src="{{ asset('assets/images/svg-icon/charts.svg') }}"
                                        class="img-fluid" alt="leads">Estado</a></li>
                            <li><a href="{{url('/informe-ventas')}}"><img
                                        src="{{asset('assets/images/svg-icon/customers.svg')  }}" class="img-fluid"
                                        alt="clients">Informes de ventas</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-ecommerce" role="tabpanel"
                        aria-labelledby="v-pills-ecommerce-tab">
                        <ul class="vertical-menu">
                            <li>
                                <h5 class="menu-title">Menu </h5>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/frontend.svg') }}" class="img-fluid"
                                        alt="frontend"><span>Ganado</span>
                                </a>
                                <ul class="vertical-submenu">
                                    <li>
                                        <a href="{{url('/animal')}}">Animales
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/razas')}}">Razas
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/frontend.svg') }}" class="img-fluid"
                                        alt="frontend"><span>Reproducción</span>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/monta')}}">Montas o Inseminaciones</a></li>
                                    <li><a href="{{url('/embarazo')}}">Gestación</a></li>
                                    <li><a href="{{url('/partos')}}">Partos</a></li>
                                    <li><a href="{{url('/abortos')}}">Aborto</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/frontend.svg') }}" class="img-fluid"
                                        alt="frontend"><span>Producción</span>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/ordeno')}}">Registro de Ordeño</a></li>

                                </ul>

                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/frontend.svg') }}" class="img-fluid"
                                        alt="frontend"><span>Nutrición</span>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/peso')}}">Registro de Peso</a></li>
                                    <li><a href="{{url('/nutricion')}}">Nutrición</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/backend.svg') }}" class="img-fluid"
                                        alt="backend"><span>Sanidad</span>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/enfermedades')}}">Registro de Enfermedades</a></li>
                                    <li><a href="{{url('/vacunas')}}">Vacunación</a></li>
                                    <li><a href="{{url('/actividades')}}">Actividades</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/muertes')}}"><img
                                        src="{{ asset('assets/images/svg-icon/frontend.svg') }}" class="img-fluid"
                                        alt="frontend"><span> Muertes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-hospital" role="tabpanel"
                        aria-labelledby="v-pills-hospital-tab">
                        <ul class="vertical-menu">
                            <li>
                                <h5 class="menu-title">Gestiones</h5>
                            </li>

                            <li><a href="{{url('/ventas')}}"><img
                                        src="{{ asset('assets/images/svg-icon/calender.svg') }}" class="img-fluid"
                                        alt="appointments">Ventas</a></li>
                            <li><a href="{{url('/clientes')}}"><img
                                        src="{{ asset('assets/images/svg-icon/doctor.svg') }}" class="img-fluid"
                                        alt="doctors">Clientes</a></li>
                            <li><a href="{{url('/usuarios')}}"><img
                                        src="{{ asset('assets/images/svg-icon/doctor.svg') }}" class="img-fluid"
                                        alt="doctors">Usuarios</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-uikits" role="tabpanel" aria-labelledby="v-pills-uikits-tab">
                        <ul class="vertical-menu">
                            <li>
                                <h5 class="menu-title">UI Kits</h5>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/basic.svg') }}" class="img-fluid"
                                        alt="basic"><span>Basic UI</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/basic-ui-kits-alerts')}}">Alerts</a></li>
                                    <li><a href="{{url('/basic-ui-kits-badges')}}">Badges</a></li>
                                    <li><a href="{{url('/basic-ui-kits-buttons')}}">Buttons</a></li>
                                    <li><a href="{{url('/basic-ui-kits-cards')}}">Cards</a></li>
                                    <li><a href="{{url('/basic-ui-kits-carousel')}}">Carousel</a></li>
                                    <li><a href="{{url('/basic-ui-kits-collapse')}}">Collapse</a></li>
                                    <li><a href="{{url('/basic-ui-kits-dropdowns')}}">Dropdowns</a></li>
                                    <li><a href="{{url('/basic-ui-kits-embeds')}}">Embeds</a></li>
                                    <li><a href="{{url('/basic-ui-kits-grids')}}">Grids</a></li>
                                    <li><a href="{{url('/basic-ui-kits-images')}}">Images</a></li>
                                    <li><a href="{{url('/basic-ui-kits-media')}}">Media</a></li>
                                    <li><a href="{{url('/basic-ui-kits-modals')}}">Modals</a></li>
                                    <li><a href="{{url('/basic-ui-kits-paginations')}}">Paginations</a></li>
                                    <li><a href="{{url('/basic-ui-kits-popovers')}}">Popovers</a></li>
                                    <li><a href="{{url('/basic-ui-kits-progressbars')}}">Progress Bars</a></li>
                                    <li><a href="{{url('/basic-ui-kits-spinners')}}">Spinners</a></li>
                                    <li><a href="{{url('/basic-ui-kits-tabs')}}">Tabs</a></li>
                                    <li><a href="{{url('/basic-ui-kits-toasts')}}">Toasts</a></li>
                                    <li><a href="{{url('/basic-ui-kits-tooltips')}}">Tooltips</a></li>
                                    <li><a href="{{url('/basic-ui-kits-typography')}}">Typography</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/advanced.svg') }}" class="img-fluid"
                                        alt="advanced"><span>Advanced UI</span><i
                                        class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/advanced-ui-kits-image-crop')}}">Image Crop</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-jquery-confirm')}}">jQuery Confirm</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-nestable')}}">Nestable</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-pnotify')}}">Pnotify</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-range-slider')}}">Range Slider</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-ratings')}}">Ratings</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-session-timeout')}}">Session Timeout</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-sweet-alerts')}}">Sweet Alerts</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-switchery')}}">Switchery</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-toolbar')}}">Toolbar</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-tour')}}">Tour</a></li>
                                    <li><a href="{{url('/advanced-ui-kits-treeview')}}">Tree View</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/apps.svg') }}" class="img-fluid"
                                        alt="apps"><span>Apps</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/apps-calender')}}">Calender</a></li>
                                    <li><a href="{{url('/apps-chat')}}">Chat</a></li>
                                    <li>
                                        <a href="javaScript:void();">Email<i class="feather icon-chevron-right"></i></a>
                                        <ul class="vertical-submenu">
                                            <li><a href="{{url('/apps-email-inbox')}}">Inbox</a></li>
                                            <li><a href="{{url('/apps-email-open')}}">Open</a></li>
                                            <li><a href="{{url('/apps-email-compose')}}">Compose</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/apps-kanban-board')}}">Kanban Board</a></li>
                                    <li><a href="{{url('/apps-onboarding-screens')}}">Onboarding Screens</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/forms.svg') }}" class="img-fluid"
                                        alt="forms"><span>Forms</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/form-inputs')}}">Basic Elements</a></li>
                                    <li><a href="{{url('/form-groups')}}">Groups</a></li>
                                    <li><a href="{{url('/form-layouts')}}">Layouts</a></li>
                                    <li><a href="{{url('/form-colorpickers')}}">Color Pickers</a></li>
                                    <li><a href="{{url('/form-datepickers')}}">Date Pickers</a></li>
                                    <li><a href="{{url('/form-editors')}}">Editors</a></li>
                                    <li><a href="{{url('/form-file-uploads')}}">File Uploads</a></li>
                                    <li><a href="{{url('/form-input-mask')}}">Input Mask</a></li>
                                    <li><a href="{{url('/form-maxlength')}}">MaxLength</a></li>
                                    <li><a href="{{url('/form-selects')}}">Selects</a></li>
                                    <li><a href="{{url('/form-touchspin')}}">Touchspin</a></li>
                                    <li><a href="{{url('/form-validations')}}">Validations</a></li>
                                    <li><a href="{{url('/form-wizards')}}">Wizards</a></li>
                                    <li><a href="{{url('/form-xeditable')}}">X-editable</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/charts.svg') }}" class="img-fluid"
                                        alt="charts"><span>Charts</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/chart-apex')}}">Apex</a></li>
                                    <li><a href="{{url('/chart-c3')}}">C3</a></li>
                                    <li><a href="{{url('/chart-chartistjs')}}">Chartist</a></li>
                                    <li><a href="{{url('/chart-chartjs')}}">Chartjs</a></li>
                                    <li><a href="{{url('/chart-flot')}}">Flot</a></li>
                                    <li><a href="{{url('/chart-knob')}}">Knob</a></li>
                                    <li><a href="{{url('/chart-morris')}}">Morris</a></li>
                                    <li><a href="{{url('/chart-piety')}}">Piety</a></li>
                                    <li><a href="{{url('/chart-sparkline')}}">Sparkline</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/icons.svg') }}" class="img-fluid"
                                        alt="icons"><span>Icons</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/icon-svg')}}">SVG</a></li>
                                    <li><a href="{{url('/icon-dripicons')}}">Dripicons</a></li>
                                    <li><a href="{{url('/icon-feather')}}">Feather</a></li>
                                    <li><a href="{{url('/icon-flag')}}">Flag</a></li>
                                    <li><a href="{{url('/icon-font-awesome')}}">Font Awesome</a></li>
                                    <li><a href="{{url('/icon-ionicons')}}">Ion</a></li>
                                    <li><a href="{{url('/icon-line-awesome')}}">Line Awesome</a></li>
                                    <li><a href="{{url('/icon-material-design')}}">Material Design</a></li>
                                    <li><a href="{{url('/icon-simple-line')}}">Simple Line</a></li>
                                    <li><a href="{{url('/icon-socicon')}}">Socicon</a></li>
                                    <li><a href="{{url('/icon-themify')}}">Themify</a></li>
                                    <li><a href="{{url('/icon-typicons')}}">Typicons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/tables.svg') }}" class="img-fluid"
                                        alt="tables"><span>Tables</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/table-bootstrap')}}">Bootstrap</a></li>
                                    <li><a href="{{url('/table-datatable')}}">Datatable</a></li>
                                    <li><a href="{{url('/table-editable')}}">Editable</a></li>
                                    <li><a href="{{url('/table-footable')}}">Foo</a></li>
                                    <li><a href="{{url('/table-rwdtable')}}">RWD</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/maps.svg') }}" class="img-fluid"
                                        alt="maps"><span>Maps</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/map-google')}}">Google</a></li>
                                    <li><a href="{{url('/map-vector')}}">Vector</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/widgets')}}">
                                    <img src="{{ asset('assets/images/svg-icon/widgets.svg') }}" class="img-fluid"
                                        alt="widgets"><span>Widgets</span><span
                                        class="badge badge-success pull-right">New</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-pages" role="tabpanel" aria-labelledby="v-pills-pages-tab">
                        <ul class="vertical-menu">
                            <li>
                                <h5 class="menu-title">Reportes</h5>
                            </li>
                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/basic_page.svg') }}" class="img-fluid"
                                        alt="basic_page"><span>PDF</span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">

                                    <li><a href="{{url('/reportes')}}">Reportes Pdf</a></li>

                                </ul>
                            </li>
                            <li>

                                <ul class="vertical-submenu">
                                    <li><a href="{{url('/user-login')}}">Login</a></li>
                                    <li><a href="{{url('/user-register')}}">Register</a></li>
                                    <li><a href="{{url('/user-forgotpsw')}}">Forgot Password</a></li>
                                    <li><a href="{{url('/user-lock-screen')}}">Lock Screen</a></li>
                                    <li><a href="{{url('/error-comingsoon')}}">Coming Soon</a></li>
                                    <li><a href="{{url('/error-maintenance')}}">Maintenance</a></li>
                                    <li><a href="{{url('/error-404')}}">Error 404</a></li>
                                    <li><a href="{{url('/error-500')}}">Error 500</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
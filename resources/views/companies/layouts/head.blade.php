<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav
        id="sidebarMenu"
        class="collapse d-lg-block sidebar collapse bg-white"
    >
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">

                <a
                    href="{{route('company.home')}}"
                    class="list-group-item list-group-item-action py-2 ripple "
                >
                    <i class="fas fa-home fa-fw me-3"></i
                    ><span>Начало</span>
                </a>
                <a
                    href="{{route('company.showEmployees')}}"
                    class="list-group-item list-group-item-action py-2 ripple "
                >
                    <i class="fas fa-users fa-fw me-3"></i
                    ><span>Работници</span>
                </a>
                <a
                    href="{{route('company.showBuses')}}"
                    class="list-group-item list-group-item-action py-2 ripple "
                >
                    <i class="fas fa-bus fa-fw me-3"></i
                    ><span>Автобуси</span>
                </a>
                <a
                    href="{{route("company.showStations")}}"
                    class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-building fa-fw me-3"></i><span>Станции</span></a
                >
                <a
                    href="{{route("company.showDestinations")}}"
                    class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-map-location-dot fa-fw me-3"></i
                    ><span>Дестинации</span></a
                ><a
                    href="{{route("company.showCourses")}}"
                    class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-calendar fa-fw me-3"></i
                    ><span>Курсове</span></a
                >


            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav
        id="main-navbar"
        class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
    >
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
              <h2>Dynamic Cities</h2>
            </a>
            <!-- Search form -->

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Notification dropdown -->

                <!-- Icon dropdown -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="united kingdom flag m-0"></i>
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdown"
                    >
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="united kingdom flag"></i>English
                                <i class="fa fa-check text-success ms-2"></i
                                ></a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="poland flag"></i>Polski</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="china flag"></i>中文</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="japan flag"></i>日本語</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="germany flag"></i>Deutsch</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="france flag"></i>Français</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="spain flag"></i>Español</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="russia flag"></i>Русский</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                            ><i class="portugal flag"></i>Português</a
                            >
                        </li>
                    </ul>
                </li>

                <!-- Avatar -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                            class="rounded-circle"
                            height="22"
                            alt=""
                            loading="lazy"
                        />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li><a class="dropdown-item" href="#">Профил</a></li>
                        <li><a class="dropdown-item" href="{{route("get.logout")}}">Илез</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main >
    <div class="container pt-4">

    </div>
</main>
<!--Main layout-->

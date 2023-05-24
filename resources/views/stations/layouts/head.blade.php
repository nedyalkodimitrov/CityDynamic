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
                    href="{{route("station.showCompanies")}}"
                    class="list-group-item list-group-item-action py-2 ripple "
                >
                    <i class="fas fa-building fa-fw me-3"></i
                    ><span>Вашите компании</span>
                </a>
                <a
                    href="{{route("station.showCompanyRequests")}}"
                    class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-clock fa-fw me-3"></i><span>Заявки от компаниите</span></a
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
                        <li><a class="dropdown-item" href="{{route("get.logout")}}">Излез</a></li>
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
<main style="margin-top: 58px">
    <div class="container pt-4">

    </div>
</main>
<!--Main layout-->

<!--Main Navigation-->
<header>

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

               @if(\Illuminate\Support\Facades\Auth::check())
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
                            <li><a class="dropdown-item" href="#">My profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <form action="{{route("logout")}}" method="post"> @csrf <button>logout</button></form></li>
                        </ul>
                    </li>

                @else
                    <li class="" style="margin-right: 2em"><a class="dropdown-item " href="{{route("login")}}">Login</a></li>
                    <li><a class="dropdown-item ml-3" href="{{route("register")}}">Register</a></li>
               @endif
                <!-- Icon dropdown -->

                <!-- Avatar -->

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

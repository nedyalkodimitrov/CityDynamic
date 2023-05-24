<!--Main Navigation-->
<style>
    /*shopping-cart-red: #DF0000;*/

    .fa-stack[data-count]:after {
        position: absolute;
        right: 0%;
        top: 0%;
        content: attr(data-count);
        font-size: 40%;
        padding: .6em;
        border-radius: 999px;
        line-height: .75em;
        color: white;
        color: #1f1a1a;;
        text-align: center;
        min-width: 2em;
        font-weight: bold;
        background: white;
        border-style: solid;
    }

    .fa-circle {
        color: #1f1a1a;
    }

    .red-cart {
        color: #1f1a1a;
        background: white;
    }
</style>
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
            <a class="navbar-brand" href="{{route("root")}}">
                <img src="{{asset("assets/images/logo.png")}}" alt="" width="200px">
            </a>
            <!-- Search form -->

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Notification dropdown -->


                @if(\Illuminate\Support\Facades\Auth::check())
                    <div style="
    display: flex;
    align-items: center;
">
                        <a href="{{route("user.showCart")}}">
                         <span class="fa-stack  has-badge" data-count="{{$itemsCount}}" style="font-size: 1.5em">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                        </a>
                    </div>
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
                                height="45"
                                alt=""
                                loading="lazy"
                            />
                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            @if(\Illuminate\Support\Facades\Auth::user()->getRoleNames()->first() == "Admin")
                                <li><a class="dropdown-item" href="{{route("homeAdmin")}}">Админ Панел</a></li>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->getRoleNames()->first() == "Bus Station Admin")
                                <li><a class="dropdown-item" href="{{route("station.home")}}">Панел за автогари</a>
                                </li>

                            @elseif(\Illuminate\Support\Facades\Auth::user()->getRoleNames()->first() == "Bus Company Admin")
                                <li><a class="dropdown-item" href="{{route("company.home")}}">Панел за компании</a>
                                </li>

                            @endif
                            <li><a class="dropdown-item" href="{{route("user.showProfile")}}">Профил</a></li>
                            <li><a class="dropdown-item" href="{{route("user.showPurchases")}}">Покупки</a></li>
                            <li><a class="dropdown-item" href="{{route("get.logout")}}">Излез</a></li>
                        </ul>
                    </li>

                @else
                    <li class="" style="margin-right: 2em"><a class="dropdown-item " href="{{route("login")}}">Влез</a>
                    </li>
                    <li><a class="dropdown-item ml-3" href="{{route("register")}}">Регистритай се</a></li>
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

<!--Main layout-->

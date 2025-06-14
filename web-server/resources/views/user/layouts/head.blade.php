<!--Main Navigation-->
<style>
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
    <nav id="main-navbar"
        class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route("root")}}">
                <img src="{{asset("assets/images/logo.png")}}" alt="" width="200px">
            </a>
            <a class="navbar-brand" href="{{route("root")}}" style="font-size: 1em; ">
                Начало
            </a>
            <a class="navbar-brand" href="{{route("user.showCompanies")}}"  style="font-size: 1em; ">
                Компании
            </a>

            <ul class="navbar-nav ms-auto d-flex flex-row">
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
                            @if(\Illuminate\Support\Facades\Auth::user()->getRoleNames()->first() == \App\Http\Constants\RoleConstant::SYSTEM_ADMIN)
                                <li><a class="dropdown-item" target="_blank" href="{{route("homeAdmin")}}">Админ Панел</a></li>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->getRoleNames()->first() == \App\Http\Constants\RoleConstant::COMPANY_ADMIN)
                                <li><a class="dropdown-item" target="_blank" href="{{route("company.home")}}">Панел за компании</a>
                                </li>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->getRoleNames()->first() == \App\Http\Constants\RoleConstant::STATION_ADMIN)
                                <li><a class="dropdown-item" target="_blank" href="{{route("station.home")}}">Панел за автогари</a>
                                </li>
                            @endif
                            <li><a class="dropdown-item" href="{{route("user.showProfile")}}">Профил</a></li>
                            <li><a class="dropdown-item" href="{{route("user.showPurchases")}}">Покупки</a></li>
                            <li><a class="dropdown-item" href="{{route("get.logout")}}">Излез</a></li>
                        </ul>
                    </li>
                @else
                    <li><a class="dropdown-item" href="{{route("login")}}">Влез</a></li> /
                    <li><a class="dropdown-item" href="{{route("register")}}">Регистритай се</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<header>
    <div id="sidebarMenu"
         class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{route('company.home')}}"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-home fa-fw me-3"></i
                    ><span>Начало</span>
                </a>
                <a href="{{route('company.showEmployees')}}"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-users fa-fw me-3"></i><span>Работници</span>
                </a>
                <a href="{{route('company.showBuses')}}"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-bus fa-fw me-3"></i
                    ><span>Автобуси</span>
                </a>
                <a href="{{route("company.showStations")}}"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-building fa-fw me-3"></i><span>Станции</span>
                </a>
                <a href="{{route("company.showDestinations")}}"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-map-location-dot fa-fw me-3"></i>
                    <span>Дестинации</span>
                </a>
                <a href="{{route("company.showCourses")}}"
                   class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-calendar fa-fw me-3"></i>
                    <span>Курсове</span>
                </a>
            </div>
        </div>
    </div>

    <div id="main-navbar"
         class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">
                <h2>Dynamic Cities</h2>
            </a>
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                       href="#"
                       id="navbarDropdownMenuLink">
                        <img
                            src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                            class="rounded-circle"
                            height="45"
                            alt=""
                            loading="lazy"/>
                    </a>
            </ul>
        </div>
    </div>
</header>

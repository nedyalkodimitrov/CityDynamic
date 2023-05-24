<html>
<head>
    <title>Dynamic City | @yield("title")</title>
    <link rel="stylesheet" href="{{asset("assets-admin/css/header.css")}}">
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
        rel="stylesheet"
    />
    <!-- MDB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js" integrity="sha512-ec1IDrAZxPSKIe2wZpNhxoFIDjmqJ+Z5SGhbuXZrw+VheJu2MqqJfnYsCD8rf71sQfKYMF4JxNSnKCjDCZ/Hlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset("assets-admin/css/header.css")}}">
    @yield("title")
</head>
<body><!--Main layout-->
<main style="margin-top: 58px">
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->

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
                <a class="navbar-brand" href="{{route("root")}}">
                    <h2>Dynamic Cities</h2>
                </a>
                <!-- Search form -->

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->

                    <!-- Icon dropdown -->

                    <li class="" style="margin-right: 2em"><a class="dropdown-item " href="{{route("login")}}">Влез</a></li>
                    <li><a class="dropdown-item ml-3" href="{{route("register")}}">Регистрация</a></li>
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

    <div class="container pt-4">


        <!-- BREADCRUMB AREA END -->

        <!-- LOGIN AREA START -->
        <div class="ltn__login-area pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center m-0">
                            <h1 class="section-title">{{__("Влез в акаунта си")}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-login-inner">
                            <form action="{{route("login")}}" method="post" class="ltn__form-box contact-form-box">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">{{__("Email")}}</label>
                                    <input name="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ old('email', 'youremail@gmail.com') }}" id="username"
                                           placeholder="Enter Email" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{__("Password")}}</label>
                                    <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                        <input type="password" name="password"
                                               class="form-control  @error('password') is-invalid @enderror"
                                               id="userpassword" placeholder="******" placeholder="Enter password"
                                               aria-label="Password" aria-describedby="password-addon">
                                        {{--                                    <button class="btn btn-light " type="button" id="password-addon"><i--}}
                                        {{--                                            class="mdi mdi-eye-outline"></i></button>--}}
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{__("Remember me")}}
                                    </label>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="theme-btn-1 btn btn-block btn btn-primary" type="submit">{{__("SIGN IN")}}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- LOGIN AREA END -->
    </div>
</main>

</body>
</html>

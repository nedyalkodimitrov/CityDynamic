<html>
<head>
    <title>Dynamic City | @yield("title")</title>
    <link rel="stylesheet" href="{{asset("assets-admin/css/header.css")}}">
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset("assets-admin/css/header.css")}}">
    <link rel="icon" type="image/x-icon" href="{{asset("assets/favicon2.ico")}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield("title")
    @yield("stylesheet")
</head>
<body>
    @include("user.layouts.head")
    <!--Main layout-->
    <main style="margin: 0; padding: 0;    margin-top: 45px;">
        @yield('content')
     </main>
    @include("user.layouts.footer")

    @yield("scripts")
</body>
</html>

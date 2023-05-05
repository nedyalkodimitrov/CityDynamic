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
<body>
    @include("companies.layouts.head")
    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">
        @yield('content')
        </div>
    </main>
    @include("companies.layouts.footer")

    @yield("scripts")
</body>
</html>

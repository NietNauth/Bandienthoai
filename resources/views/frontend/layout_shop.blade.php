<!DOCTYPE html>
<html>
<head>
    <title>Didongviet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset ('frontend/images/fav.jpg') }}"/>
    <link href="{{ asset ('frontend/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/css/carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/css/carousel/owl.theme.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/reset.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('frontend/responsive.css') }}" rel="stylesheet" type="text/css"/>
    

    <script src="{{ asset ('frontend/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('frontend/js/elevatezoom-master/jquery.elevateZoom-3.0.8.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('frontend/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('frontend/js/carousel/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('frontend/js/main.js') }}" type="text/javascript"></script>

</head>
<body>
    <div id="site">
        <div id="container">
            @include("frontend.header")

            <div id="main-content-wp" class="home-page">
                @yield("do-du-lieu-vao-layout")
            </div>
        </div>
    </div>
    @include("frontend.footer")

</body>
</html>
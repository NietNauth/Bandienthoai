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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6488729acc26a871b022460d/1h2qfvbf6';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
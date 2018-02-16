<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My ice tool Application</title>

    <meta name="description" content="My Ice Tool est une application destinée à la prévention des risques en montagne, principalement pour les alpinistes pratiquant la monté de cascade de glace">
    <meta name="author" content="Rouzot Julien">
    <link rel="shortcut icon" href="https://julienrouzot.com/LogoMIT.png">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/css/mdb.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <style type="text/css">
    body{  background-image: url(https://wallpapertag.com/wallpaper/full/f/1/9/196071-cool-blue-background-2560x1600-for-ipad-pro.jpg);
    background-size: cover }
   </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head')

</head>

<body>

<!--Navigation-->
<header>

@include('partials.above-navbar-alert')

<!--Navbar-->
    <nav class="navbar navbar-dark scrolling-navbar mdb-gradient">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i></button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">

                <!--Links-->
                <ul class="nav navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.home')  }}"><i class="fa fa-home"></i> Accueil</a>
                    </li>
                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}"><i class="fa fa-registered"></i> Inscription</a>
                    </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::user()->homeUrl() }}"><i class="fa fa-user"></i> Profil {{ Auth::user()->first_name }}</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Deconnexion</a>
                    </li>
                    @endif
                </ul>

                <!--Navbar icons-->
                <ul class="nav navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://miw.ovh//" class="nav-link"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://miw.ovh//" class="nav-link"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://miw.ovh//" class="nav-link"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://miw.ovh//" class="nav-link"><i class="fa fa-github"></i></a>
                    </li>
                </ul>

            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->


</header>
<!--/Navigation-->

<main>
<div class="container">

    <div style="height: 90px;"></div>
    @yield('content')

</div> <!-- /container -->
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/js/mdb.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

@yield('footer')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60551246-3', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>

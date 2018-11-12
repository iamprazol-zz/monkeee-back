<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Monkee - In Music We Trust </title>

    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/coming-sssoon.css" rel="stylesheet" />

    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">


</head>

<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                      <li> <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form></li>
                 </ul>
          </li>
                    @endguest

        </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="https://www.facebook.com/Monkeee-273157566551238/?ref=br_rs">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/monkeee_au/">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="mailto:monkeee92@gmail.com">
                        <i class="fa fa-envelope-o"></i>
                    </a>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<div class="main" style="background-color: #f9ed75;">
    <!--<div class="main" style="background-image: url('images/bg_monkee.jpg'">-->

    <!--    Change the image source '/images/default.jpg' with your favourite image.     -->

    <!--    <div class="cover black" data-color="black"></div>-->

    <!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <div class="logo-box">
            <img style="width:100%;" src="images/Logo.svg">
            <div class="divider-2">
            </div>
        </div>

        <!--  H1 can have 2 designs: "logo" and "logo cursive"           -->

        <div class="content">
            <h4 class="motto">"FIRST EVENTS APP IN MELBOURNE"</h4>
        </div>
        <img src="images/coming-soon.png">
    </div>
    <div class="footer">
        <div class="container" style="color: #2d2d2d; text-align: center;">
            Made with <i class="fa fa-heart heart"></i> by <a style="color: #2d2d2d;" href="http://www.simonedistefano..com">Simone Di Stefano</a>.
        </div>
    </div>
</div>
</body>
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</html>
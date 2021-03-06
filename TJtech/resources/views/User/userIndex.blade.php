<?php
    use App\Http\Controllers\ProizvodiController;
    $ukupanBrojProizvoda=ProizvodiController::brojProizvodaUKosari();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TJ-tech</title>

        <!-- CSS -->

        <!-- google fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.1-web/css/all.css') }}">

        <!-- files -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    </head>
    <body>

    <!-- Site Header -->
        <div class="site-header-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('userProfile')}}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3 text-right">

                        <!--Košarica i User-->
                        <div class="dropdown-user">
                            <span style="padding-right: 10px;">{{$LogiraniKorisnikPodaci->Ime_prezime}}</span><button><i class="fas fa-user btn btn-default user"></i></button><br>
                            <ul>
                            @if($ukupanBrojProizvoda>0)
                                <li><a href="{{route('kosara')}}">Profil</a></li>
                                @else
                                <li><a href="{{route('praznaKosara')}}">Profil</a></li>
                            @endif
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </div>

                        <form id="form-data" class="input-group" method="post" data-route="{{ route('search.fetch') }}">
                            {{ csrf_field() }}
                            <input type="text" name="Naziv_proizvoda" id="Naziv_proizvoda" 
                                class="form-control" placeholder="Search..." autocomplete="off"> 
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-robot" type="button">Pretraga</button>
                            </span>
                            <div id="countryList" class="dropdown-menu" style="display:block; position:absolute; background-color: transparent">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- Header -->

        <section id="header" class="main-header">
            <div class="container">

                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-nav-bar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="site-nav-bar">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{route('userProfile')}}">Početna</a></li>
                                <li><a href="{{route('userOnama')}}">O nama</a></li>
                                <li><a href="{{route('laptopiUser')}}"><b><i><u>Laptopi</u></i></b></a></li>
                                <li><a href="{{route('racunalaUser')}}"><b><i><u>Računala</u></i></b></a></li>
                                <li><a href="{{route('opremaUser')}}"><b><i><u>Oprema</u></i></b></a></li>
                                <li><a href="{{ asset('assets\TJ-tech, vizija.pdf') }}">Vizija</a></li>
                                <li><span class="ion-android-cart btn btn-default"style="margin-top: 10px; cursor: default;">
                                    @if($ukupanBrojProizvoda>0)
                                        <a href="{{route('kosara')}}"> {{$ukupanBrojProizvoda}} proizvoda </a>
                                        @else
                                        <a href="{{route('praznaKosara')}}"> {{$ukupanBrojProizvoda}} proizvoda </a>
                                    @endif
                                        </span>
                                    </span>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
                
                <div class="intro row">
                    <div class="overlay"></div>
                    <div class="col-sm-6 col-sm-offset-6">
                        <h2 class="header-quote">Snaga kvalitete<!--Save time and lower--></h2>
                        <p>
                            <!--Your sweeping costs with the-->
                            Prodajemo digitalne čarolije
                        </p>
                        <h1 class="header-title">TJ<br><span class="thin">tech</span></h1>
                    </div>
                </div> <!-- /.intro.row -->
            </div> <!-- /.container -->
            <div class="nutral"></div>
        </section> <!-- /#header -->

    <!-- Product -->

        <section id="product" class="product">
            <div class="container section-bg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <h2 class="title">Dobro došli u <span>TJ tech</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="porduct-box">
                            <img class="img-responsive" src="{{ asset('assets/images/product-1.jpg') }}" alt="product">
                            <a href="{{route('laptopiUser')}}" class="btn btn-default btn-robot"><h3>Laptopi</h3></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="porduct-box">
                            <img class="img-responsive" src="{{ asset('assets/images/product-2.jpg') }}" alt="product">
                            <a href="{{route('racunalaUser')}}" class="btn btn-default btn-robot"><h3>Računala</h3></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="porduct-box">
                            <img class="img-responsive" src="{{ asset('assets/images/product-3.jpg') }}" alt="product">
                            <a href="{{route('opremaUser')}}" class="btn btn-default btn-robot"><h3>Oprema</h3></a>
                        </div>
                    </div>
                </div>

                <!-- Why we are the best -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="classic-title">
                            <div class="stiker">
                                <h3 class="inner-stiker">Zašto najbolji?</h3>
                            </div>
                            <h3 class="outer-stiker">Kvalitetni, povoljni, brzi i uslužni!</h3>
                            <div class="incline-div"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- History -->
        <section id="history" class="history">
            <div class="container section-bg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <p>Od 2017</p>
                            <h2 class="title mt0">Naša povijest</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="boxed">
                        <div class="col-sm-10 col-sm-offset-1">
                            <p>
                                Mi smo shop koji nosi korijene iz Mostara sa fakulteta Računarstva FSRE, gdje smo dobili sve vještine koje su nam potrebne
                                da ostvarimo naš TJ-tech shop. Zašto "TJ"? Jednostavno je i kratko, po kreatorima: Vinko-<b>T</b>ino Zlopaša i <b>J</b>ure Bakula.
                                Za više informacija pogledajte <a href="assets\TJ-tech, vizija.pdf" style="color: #fabe12;"><u><b>VIZIJU</b></u></a>. 
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <a href="http://fsre.sum.ba/naslovnica" target="new tab">
                                <img class="img-responsive" src="{{ asset('assets/images/history.jpg') }}" alt="history">
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
        </section>

    


    <!-- Footer -->
        <section id="footer-widget" class="footer-widget">
            <div class="container header-bg">
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Popularni proizvodi</h3>
                        <ul>
                        <li><a href="{{route('laptopiUser')}}#7">NOTEBOOK ACER ASPIRE 3</a></li>
                        <li><a href="{{route('racunalaUser')}}#5">RAČUNALO GAMER DIABLO 3600</a></li>
                        <li><a href="{{route('opremaUser')}}#22">GAMING STOLICA LC-POWER LC-GC-600BR</a></li>
                        <li><a href="{{route('opremaUser')}}#19">SLUŠALICE LOGITECH H650E</a></li>
                    </ul>
                    </div>
                    <div class="col-sm-4">
                        <h3>Programski jezici</h3>
                        <ul>
                            <li><i class="fab fa-js-square" style="font-size: 50px; padding-left: 5px; color: rgb(241, 241, 53);"></i><a href="userOnama.html#Jezici" style="padding-left: 20px;"> Java Script</a></li>
                            <li><i class="fab fa-php" style="font-size: 50px; padding-left: 5px; color: purple;"></i><a href="userOnama.html#Jezici" style="padding-left: 20px;">PHP</a></li>
                            <li><i class="fas fa-database" style="font-size: 50px; padding-left: 5px; color: #fabe12;"></i><a href="userOnama.html#Jezici" style="padding-left: 20px;">SQL Database</a></li>
                            <li><i class="fab fa-html5" style="font-size: 50px; padding-left: 5px; color: orangered;"></i><a href="userOnama.html#Jezici" style="padding-left: 20px;">HTML5</a></li>
                            <li><i class="fab fa-css3-alt" style="font-size: 50px; padding-left: 5px; color: blue;"></i><a href="userOnama.html#Jezici" style="padding-left: 20px;">CSS3</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h3>Korisne informacije</h3>
                        <ul>
                            <li><a href="{{route('userOnama')}}">O nama</a></li>
                            <li><a href="{{ asset('assets\TJ-tech, vizija.pdf') }}">Vizija</a></li>
                            <li><a href="{{route('userProfile')}}">Početna</a></li>
                            <li><a href="{{route('laptopiUser')}}">Laptopi</a></li>
                            <li><a href="{{route('racunalaUser')}}">Računala</a></li>
                            <li><a href="{{route('opremaUser')}}">Oprema</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <h3>Copyright &copy; 2021 My Website</h3>
        </footer>

    <!-- Scripts -->
        <script  src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
        <script  src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script  src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script  src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script  src="{{ asset('assets/js/script.js') }}"></script>
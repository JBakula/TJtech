<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TJ-tech | Računala</title>

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
                    <a href="{{route('indexIndex')}}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                </div>
                <div class="col-sm-3 col-sm-offset-3 text-right">

                    <!--Košarica i User-->
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

        <section id="header" class="main-header shop-header2 inner-header">
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
                                <li><a href="{{route('indexIndex')}}">Početna</a></li>
                                <li><a href="{{route('oNama')}}">O nama</a></li>
                                <li><a href="{{route('laptopi')}}"><b><i><u>Laptopi</u></i></b></a></li>
                                <li class="active"><a href="{{route('racunala')}}"><b><i><u>Računala</u></i></b></a></li>
                                <li><a href="{{route('oprema')}}"><b><i><u>Oprema</u></i></b></a></li>
                                <li><a href="{{ asset('assets\TJ-tech, vizija.pdf') }}">Vizija</a></li>
                                <li><a href="{{route('loginIndex')}}" style="margin: 0; padding: 0;">
                                    <button class="btn btn-default btn-robot" style="border-radius: 5px; margin: 10px 10px;">Login</button>
                                </a></li>
                                <li><a href="{{route('singUpIndex')}}" style="margin: 0; padding: 0;">
                                    <button class="btn btn-default btn-robot" style="border-radius: 5px; margin: 10px 10px;">Signup</button>
                                </a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
                
                <div class="intro row">
                    <div class="overlay"></div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="{{route('indexIndex')}}">Početna</a></li>
                            <li class="active">Računala</li>
                        </ol>
                    </div>
                </div> <!-- /.intro.row -->
            </div> <!-- /.container -->
            <div class="nutral"></div>
        </section> <!-- /#header -->

    <!-- Shop -->
        <section class="shop">
            <div class="container page-bgc">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <p>Dođite po naša</p>
                            <h2 class="title mt0">Računala</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="boxed">
                        <!-- 1 -->
                        @foreach($dataRacunala as $item)
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" id="{{$item->proizvod_id}}" src="{{$item->Slika}}" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="{{$item->Velika_slika}}">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <form action="{{route('dodajRacunalaUKosaru')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="proizvod_id" value="{{$item->proizvod_id}}">
                                                <button class="ion-ios-cart"> Dodaj u košaru</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="shop-box-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>{{$item->Naziv_proizvoda}}</h4><br>
                                        <h4>CPU: <span class="thin">{{$item->CPU}}</span></h4>
                                        <h4>RAM: <span class="thin">{{$item->RAM}}</span></h4>
                                        <h4>Memory: <span class="thin">{{$item->Memorija}}</span></h4>
                                        <h4>Graphic Card: <span class="thin">{{$item->Graficka}}</span></h4>
                                        @if($item->proizvod_id==4)
                                        <br>
                                        <br>
                                        @endif
                                    </div> 
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                        {{$item->Cijena}} KM
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                        <li><a href="{{route('laptopi')}}#7">NOTEBOOK ACER ASPIRE 3</a></li>
                        <li><a href="{{route('racunala')}}#5">RAČUNALO GAMER DIABLO 3600</a></li>
                        <li><a href="{{route('oprema')}}#22">GAMING STOLICA LC-POWER LC-GC-600BR</a></li>
                        <li><a href="{{route('oprema')}}#19">SLUŠALICE LOGITECH H650E</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3>Programski jezici</h3>
                    <ul>
                        <li><i class="fab fa-js-square" style="font-size: 50px; padding-left: 5px; color: rgb(241, 241, 53);"></i><a href="Onama.html#Jezici" style="padding-left: 20px;"> Java Script</a></li>
                        <li><i class="fab fa-php" style="font-size: 50px; padding-left: 5px; color: purple;"></i><a href="Onama.html#Jezici" style="padding-left: 20px;">PHP</a></li>
                        <li><i class="fas fa-database" style="font-size: 50px; padding-left: 5px; color: #fabe12;"></i><a href="Onama.html#Jezici" style="padding-left: 20px;">SQL Database</a></li>
                        <li><i class="fab fa-html5" style="font-size: 50px; padding-left: 5px; color: orangered;"></i><a href="Onama.html#Jezici" style="padding-left: 20px;">HTML5</a></li>
                        <li><i class="fab fa-css3-alt" style="font-size: 50px; padding-left: 5px; color: blue;"></i><a href="Onama.html#Jezici" style="padding-left: 20px;">CSS3</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3>Korisne informacije</h3>
                    <ul>
                        <li><a href="{{route('oNama')}}">O nama</a></li>
                        <li><a href="{{ asset('assets\TJ-tech, vizija.pdf') }}">Vizija</a></li>
                        <li><a href="{{route('indexIndex')}}">Početna</a></li>
                        <li><a href="{{route('laptopi')}}">Laptopi</a></li>
                        <li><a href="{{route('racunala')}}">Računala</a></li>
                        <li><a href="{{route('oprema')}}">Oprema</a></li>
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

    </body>
</html>
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

        <title>TJ-tech | Računala</title>

        <!-- CSS -->

        <!-- google fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='fontawesome-free-5.15.1-web/css/all.css' rel='stylesheet'>

        <!-- files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/magnific-popup.css" rel="stylesheet">
        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.carousel.theme.min.css" rel="stylesheet">
        <link href="assets/css/ionicons.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">

    </head>
    <body>

    <!-- Site Header -->
    <div class="site-header-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="adminIndex.html"><img src="assets/images/logo.png" alt="logo"></a>
                </div>
                <div class="col-sm-3 col-sm-offset-3 text-right">

                    <!--Košarica i User-->
                    <div class="admin-dropdown-user">
                        <span style="padding-right: 10px;">{{$LogiraniKorisnikPodaci->Ime_prezime}}</span><button><i class="fas fa-user btn btn-default user"></i></button><br>
                        <ul>
                            <li><a href="logout">Logout</a></li>
                            <li><a href="#">Proizvodi</a></li>
                            <li><a href="#">Korisnici</a></li>
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
                                <li><a href="adminIndex.html">Početna</a></li>
                                <li><a href="adminOnama.html">O nama</a></li>
                                <li><a href="adminLaptopi.html"><b><i><u>Laptopi</u></i></b></a></li>
                                <li class="active"><a href="adminRačunala.html"><b><i><u>Računala</u></i></b></a></li>
                                <li><a href="adminOprema.html"><b><i><u>Oprema</u></i></b></a></li>
                                <li><a href="assets\TJ-tech, vizija.pdf">Vizija</a></li>
                                <!--
                                <li><a href="login.html" style="margin: 0; padding: 0;">
                                    <button class="btn btn-default btn-robot" style="border-radius: 5px; margin: 10px 10px;">Login</button>
                                </a></li>
                                <li><a href="signup.html" style="margin: 0; padding: 0;">
                                    <button class="btn btn-default btn-robot" style="border-radius: 5px; margin: 10px 10px;">Signup</button>
                                </a></li>
                                -->
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
                
                <div class="intro row">
                    <div class="overlay"></div> 
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="adminIndex.html">Početna</a></li>
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
                        @foreach($dataRacunalaAdmin as $item)
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" id="{{$item->proizvod_id}}" src="{{$item->Slika}}" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="{{$item->Velika_slika}}">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <!--<a href="#">
                                                <span class="ion-ios-cart"></span>
                                            </a>-->
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
                                        {{$item->Cijena}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- 2
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-22.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-22.jpg">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <a href="#">
                                                <span class="ion-ios-cart"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-box-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Računalo Master G6400</h4><br>
                                        <h4>CPU: <span class="thin">Intel Pentium G6400</span></h4>
                                        <h4>RAM: <span class="thin">8GB DDR4</span></h4>
                                        <h4>Memory: <span class="thin">250GB NVMe SSD</span></h4>
                                        <h4>Graphic Card: <span class="thin">Intel UHD Graphics 610</span></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 384,79
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- 3 
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-33.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-33.jpg">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <a href="#">
                                                <span class="ion-ios-cart"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-box-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>All in one Lenovo IdeaCentre AIO 3, F0EW008ESC, 23.8" FHD</h4><br>
                                        <h4>CPU: <span class="thin">AMD Ryzen 3 4300U up to 3.7GHz</span></h4>
                                        <h4>RAM: <span class="thin">8GB DDR4</span></h4>
                                        <h4>Memory: <span class="thin">512GB NVMe SSD</span></h4>
                                        <h4>Graphic Card: <span class="thin">AMD Radeon Graphics</span></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 796,82
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- 4
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-44.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-44.jpg">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <a href="#">
                                                <span class="ion-ios-cart"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-box-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Stolno računalo Acer Veriton X2665G SFF, DT.VSEEX.010</h4><br>
                                        <h4>CPU: <span class="thin">Intel Core i3 9100 up to 4.20GHz</span></h4><br>
                                        <h4>RAM: <span class="thin">8GB DDR4</span></h4>
                                        <h4>Memory: <span class="thin">256GB SSD</span></h4>
                                        <h4>Graphic Card: <span class="thin">Intel UHD Graphics 630</span></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 736,42
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- 5 
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" id="two" src="assets/images/shop-55.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-55.jpg">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <a href="#">
                                                <span class="ion-ios-cart"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-box-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Računalo Gamer Diablo 3600</h4><br>
                                        <h4>CPU: <span class="thin">AMD Ryzen 5 3600 up to 4.2GHz</span></h4>
                                        <h4>RAM: <span class="thin">8GB DDR4</span></h4>
                                        <h4>Memory: <span class="thin">1TB NVMe SSD</span></h4>
                                        <h4>Graphic Card: <span class="thin">NVIDIA GTX1660 SUPER 6GB</span></h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 1392,53
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- 6 
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-66.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-66.jpg">
                                                <span class="ion-ios-search-strong just-img"></span>
                                            </a>
                                            <a href="#">
                                                <span class="ion-ios-cart"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-box-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Računalo Gamer Anubis Pro</h4><br>
                                        <h4>CPU: <span class="thin">Intel Core i9 10900K up to 5.3GHz</span></h4>
                                        <h4>RAM: <span class="thin">32GB DDR4</span></h4>
                                        <h4>Memory: <span class="thin">1TB NVMe SSD</span></h4>
                                        <h4>Graphic Card: <span class="thin">NVIDIA RTX3090 24GB</span></h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 4898,90
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!--
                        <div class="col-sm-12">
                            <nav>
                                <ul class="pager">
                                    <li class="previous disabled"><a href="#"><span aria-hidden="true" class="ion-chevron-left"></span></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#"><span aria-hidden="true" class="ion-chevron-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                        -->
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
                        <li><a href="{{route('laptopiAdmin')}}#7">NOTEBOOK ACER ASPIRE 3</a></li>
                        <li><a href="{{route('racunalaAdmin')}}#5">RAČUNALO GAMER DIABLO 3600</a></li>
                        <li><a href="{{route('opremaAdmin')}}#22">GAMING STOLICA LC-POWER LC-GC-600BR</a></li>
                        <li><a href="{{route('opremaAdmin')}}#19">SLUŠALICE LOGITECH H650E</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3>Programski jezici</h3>
                    <ul>
                        <li><i class="fab fa-js-square" style="font-size: 50px; padding-left: 5px; color: rgb(241, 241, 53);"></i><a href="adminOnama.html" style="padding-left: 20px;"> Java Script</a></li>
                        <li><i class="fab fa-php" style="font-size: 50px; padding-left: 5px; color: purple;"></i><a href="adminOnama.html" style="padding-left: 20px;">PHP</a></li>
                        <li><i class="fas fa-database" style="font-size: 50px; padding-left: 5px; color: #fabe12;"></i><a href="adminOnama.html" style="padding-left: 20px;">SQL Database</a></li>
                        <li><i class="fab fa-html5" style="font-size: 50px; padding-left: 5px; color: orangered;"></i><a href="adminOnama.html" style="padding-left: 20px;">HTML5</a></li>
                        <li><i class="fab fa-css3-alt" style="font-size: 50px; padding-left: 5px; color: blue;"></i><a href="adminOnama.html" style="padding-left: 20px;">CSS3</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3>Korisne informacije</h3>
                    <ul>
                        <li><a href="{{route('OnamaAdmin')}}">O nama</a></li>
                        <li><a href="assets\TJ-tech, vizija.pdf">Vizija</a></li>
                        <li><a href="{{route('adminProfile')}}">Početna</a></li>
                        <li><a href="{{route('laptopiAdmin')}}">Laptopi</a></li>
                        <li><a href="{{route('racunalaAdmin')}}">Računala</a></li>
                        <li><a href="{{route('opremaAdmin')}}">Oprema</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <h3>Copyright &copy; 2021 My Website</h3>
    </footer>

    <!-- Scripts -->
        <script src="assets/js/jquery-1.12.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TJ-tech | Oprema</title>

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

        <link href="assets/jquery-ui/jquery-ui.css" rel="stylesheet">
        <link href="assets/jquery-ui/jquery-ui.structure.css" rel="stylesheet">
        <link href="assets/jquery-ui/jquery-ui.theme.css" rel="stylesheet">

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
                            <li><a href="#">Profil</a></li>
                            <li><a href="logout">Logout</a></li>
                            <li><a href="#">Proizvodi</a></li>
                            <li><a href="#">Korisnici</a></li>
                        </ul>
                    </div>

                    <form>
                        <div class="input-group">
                            <input id="Search" type="text" class="form-control" placeholder="Pretraga..." autocomplete="off">
                            <span class="input-group-btn">
                                <button id="Pretrazi" class="btn btn-default btn-robot" type="button">Pretraga</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Header -->

        <section id="header" class="main-header shop-header3 inner-header">
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
                                <li><a href="adminRačunala.html"><b><i><u>Računala</u></i></b></a></li>
                                <li class="active"><a href="adminOprema.html"><b><i><u>Oprema</u></i></b></a></li>
                                <li><a href="assets\TJ-tech, vizija.pdf">Vizija</a></li>
                                <li><span class="ion-android-cart btn btn-default"style="margin-top: 10px; cursor: default;"> 0 produkata </span></li>
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
                            <li class="active">Oprema</li>
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
                            <p>Dođite po našu</p>
                            <h2 class="title mt0">Opremu</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="boxed">
                        <!-- 1 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-111.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-111.jpg">
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
                                        <h4>
                                            Monitor Asus 27" TUF GAMING VG27VH1B, VA, Gaming, Adaptive-sync, FreeSync Premium 165Hz, 
                                            VGA, HDMI, Zvučnici, Zakrivljeni 1500R, Full HD
                                        </h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 354,59
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-222.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-222.jpg">
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
                                        <h4>
                                            Monitor Philips 24" 241B8QJEB, IPS, 
                                            VGA, DVI, HDMI, DP, 2xUSB3.0, 2xUSB2.0, Pivot, Zvučnici, Full HD
                                        </h4><br>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 216,21
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-333.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-333.jpg">
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
                                        <h4>Miš Genius Scorpion Spear, RGB LED, crni</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 12,61
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-444.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-444.jpg">
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
                                        <h4>Podloga za miš MS TERIS M105, gaming</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 1,56
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 5 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-555.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-555.jpg">
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
                                        <h4>Tipkovnica MS FLARE gaming LED</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 216,21
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 6 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-666.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-666.jpg">
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
                                        <h4>Slušalice Sony WH-CH510, bežične, NFC/Bluetooth, crne</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 48,88
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 7 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" id="foure" src="assets/images/shop-777.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-777.jpg">
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
                                        <h4>Slušalice Logitech H650e, stereo, s mikrofonom, USB</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 93,08
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 8 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-888.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-888.jpg">
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
                                        <h4>Miš MS IMPERATOR 2, gaming, žični</h4><br>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 9,81
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 9 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" src="assets/images/shop-999.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-999.jpg">
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
                                        <h4>Tipkovnica Speedlink Niala, UK/HR Layout, crna</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 7,94
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 10 -->
                        <div class="col-sm-6">
                            <div class="shop-box">
                                <img class="img-full img-responsive" id="three" src="assets/images/shop-100.jpg" alt="shop">
                                <div class="shop-box-hover text-center">
                                    <div class="c-table">
                                        <div class="c-cell">
                                            <a class="test-popup-link" href="assets/images/shop-big-100.jpg">
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
                                        <h4>Gaming stolica LC-Power LC-GC-600BR, crno/crvena</h4><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="shop-price">
                                            $ 182,12
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <li><a href="adminLaptopi.html">NOTEBOOK ACER ASPIRE 3</a></li>
                        <li><a href="adminRačunala.html">RAČUNALO GAMER DIABLO 3600</a></li>
                        <li><a href="adminOprema.html">GAMING STOLICA LC-POWER LC-GC-600BR</a></li>
                        <li><a href="adminOprema.html">SLUŠALICE LOGITECH H650E</a></li>
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
                <div class="col-sm-4">userOnama.html
                    <h3>Korisne informacije</h3>
                    <ul>
                        <li><a href="adminOnama.html">O nama</a></li>
                        <li><a href="assets\TJ-tech, vizija.pdf">Vizija</a></li>
                        <li><a href="adminIndex.html">Početna</a></li>
                        <li><a href="adminLaptopi.html">Laptopi</a></li>
                        <li><a href="adminRačunala.html">Računala</a></li>
                        <li><a href="adminOprema.html">Oprema</a></li>
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

        <script src="assets/jquery-ui/jquery-ui.js"></script>
    </body>
</html>
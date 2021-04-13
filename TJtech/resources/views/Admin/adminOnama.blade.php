<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TJ-tech | O nama</title>

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

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                        <!--
                        <div class="input-group">
                            <input type="text" name="Naziv_proizvoda" id="Naziv_proizvoda" class="form-control input-lg" placeholder="" autocomplete="off"> 
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-robot" type="button">Pretraga</button>
                                </span>
                                <div id="countryList">
                                </div>
                                {{ csrf_field() }}
                            </div>
                        </div>
                        -->
                </div>
            </div>
        </div>
    </div>
        
    <!-- Header -->

    <section id="header" class="main-header about-header inner-header">
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
                            <li class="active"><a href="adminOnama.html">O nama</a></li>
                            <li><a href="adminLaptopi.html"><b><i><u>Laptopi</u></i></b></a></li>
                            <li><a href="adminRačunala.html"><b><i><u>Računala</u></i></b></a></li>
                            <li><a href="adminOprema.html"><b><i><u>Oprema</u></i></b></a></li>
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
                        <li class="active">O nama</li>
                    </ol>
                </div>
            </div> <!-- /.intro.row -->
        </div> <!-- /.container -->
        <div class="nutral"></div>
    </section> <!-- /#header -->

    <!-- About -->
        <section class="about">
            <div class="container page-bgc">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <p>Programski</p>
                            <h2 class="title mt0" id="Jezici">Jezici</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="boxed">
                        <div class="col-sm-12">
                            <p class="inner-p">
                                Svi alati, odnosno programski jezici koje smo koristili za izradu naše stranice.
                                Uz osnovne jezike koji su navedeni, koristili smo još raznih filova, biblioteka i frameworka.
                                Framework(Laravel) za PHP i biblioteka(JQuery) za JS.<br>
                                Neki od filova su: bootstrap, magnific-popup, ion-icons, font-awsome.
                            </p>
                        </div>
                    </div>
                </div>
                

            <!-- Services -->
                <div class="service">
                    <div class="row">
                        <div class="boxed">
                            <div class="col-sm-4">
                                <div class="service-box">
                                    <div class="service-title">
                                        <div class="icon">
                                            <span class="fab fa-html5" style="color: orangered;"></span>
                                        </div>
                                         <div class="mt-10">
                                            HTML5
                                        </div>
                                    </div>
                                    <p>
                                        HTML je kratica za HyperText Markup Language, što znači prezentacijski jezik za izradu web stranica. 
                                        Hipertekst dokument stvara se pomoću HTML jezika. HTML jezikom oblikuje se sadržaj i stvaraju se hiperveze hipertext dokumenta.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="service-box">
                                    <div class="service-title">
                                        <div class="icon">
                                            <span class="fab fa-css3-alt" style="color: blue;"></span>
                                        </div>
                                         <div class="mt-10">
                                            CSS3
                                        </div>
                                    </div>
                                    <p> 
                                        CSS je kratica od Cascading Style Sheets. 
                                        Radi se o stilskom jeziku, koji se rabi za opis prezentacije dokumenta napisanog pomoću markup (HTML) jezika.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="service-box">
                                    <div class="service-title">
                                        <div class="icon">
                                            <span class="fab fa-js-square" style="color: yellow;"></span>
                                        </div>
                                         <div>
                                            Java Script
                                        </div>
                                    </div>
                                    <p>
                                        JavaScript je skriptni programski jezik, koji se izvršava u web pregledniku na strani korisnika. 
                                        Napravljen je da bude sličan Javi, ali nije objektno orijentiran kao Java, 
                                        već se temelji na prototipu i tu prestaje svaka povezanost s programskim jezikom Java.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="service-box">
                                    <div class="service-title">
                                        <div class="icon">
                                            <span class="fab fa-php" style="color: purple;"></span>
                                        </div>
                                         <div class="mt-10">
                                            PHP
                                        </div>
                                    </div>
                                    <p>
                                        PHP ili Personal Home Page (ili PHP: Hypertext Preprocessor) je jedno od server-side open source rješenja. 
                                        PHP je reflektivni programski jezik prvobitno dizajniran za pravljenje dinamičkih web stranica.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="service-box">
                                    <div class="service-title">
                                        <div class="icon">
                                            <span class="fas fa-database" style="color: orange;"></span>
                                        </div>
                                         <div class="mt-10">
                                            SQL Database
                                        </div>
                                    </div>
                                    <p>
                                        Skraćenica SQL znači Structured Query Language. 
                                        Razvijen je 70-tih godina od strane firme IBM. SQL je standardni jezik sistema za upravljanje bazama podataka.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="service-box">
                                    <div class="service-title">
                                         <div class="mt-10">
                                            <span style="color: red;">Laravel</span> / <span style="color: rgb(29, 181, 231);">JQuery</span>
                                        </div>
                                    </div>
                                    <p>
                                        Laravel je open-source web framework. Baziran je na PHP-u.
                                        jQuery je JavaScript knjižnica dizajnirana za pojednostavljivanje i manipulacije stablom HTML DOM- a, kao i događajima , CSS animacija i Ajax .
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Team -->
                <div class="team">
                    <div class="row">
                        <div class="boxed">
                            <div class="col-sm-12">
                                <div class="title-box">
                                    <p>Upoznajte nas</p>
                                    <h2 class="title mt0">Kreatori</h2>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="team-box">
                                    <div class="team-img">
                                        <img class="team-img img-responsive" src="assets/images/team-1.png" alt="team">
                                    </div>
                                    <div class="team-img-detail">
                                        <h4 class="member-name">Jure Bakula</h4>
                                        <h5 class="member-id">Founder &amp; CEO</h5>
                                        <p>
                                            Prijatelji otkad znamo za sebe, samo je bilo pitanje kad će nastat stranica, odnosno TJ-tech.
                                            Osobno o meni: Dolazim iz Posušja, gdje sam završio osnovnu i srednju školu.
                                            Najdraže jelo mi je...sve, a najdraži predmet u školi mi je bio tjelesni.
                                            Tijekom svog školovanja zavolio sam tehnologiju i programiranje općenito pa sam odlučio
                                            upisati fakultet Računarstva da proširim svoje znanje. I tako smo došli do TJ-techa.
                                        </p>
                                        <div class="social">
                                            <a href="#"><i class="ion-social-instagram-outline"></i></a>
                                            <a href="#"><i class="ion-social-googleplus"></i></a>
                                            <a href="https://github.com/JBakula"><i class="ion-social-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="team-box">
                                    <div class="team-img">
                                        <img class="team-img img-responsive" src="assets/images/team-2.png" alt="team">
                                    </div>
                                    <div class="team-img-detail">
                                        <h4 class="member-name">Vinko-Tino Zlopaša</h4>
                                        <h5 class="member-id">Founder &amp; CEO</h5>
                                        <p>
                                            Sve isto. Samo sam manji i širi.
                                        </p>
                                        <div class="social">
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                            <a href="#"><i class="ion-social-googleplus"></i></a>
                                            <a href="https://github.com/zlopy99"><i class="ion-social-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    </body>
</html>
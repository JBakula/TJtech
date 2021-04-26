
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
                        <a href="{{route('adminProfile')}}"><img src="assets/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3 text-right">

                        <!--Košarica i User-->
                        <div class="admin-dropdown-user">
                            <span style="padding-right: 10px;">{{$LogiraniKorisnikPodaci->Ime_prezime}}</span><button><i class="fas fa-user btn btn-default user"></i></button><br>
                            <ul>
                                <li><a href="logout">Logout</a></li>
                                <li><a href="{{route('adminUpravljanjeProizvodima')}}">Proizvodi</a></li>
                                <li><a href="{{route('korisniciAdmin')}}">Korisnici</a></li>
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
                                <li><a href="{{route('adminProfile')}}">Početna</a></li>
                                <li><a href="{{route('OnamaAdmin')}}">O nama</a></li>
                                <li><a href="{{route('laptopiAdmin')}}"><b><i><u>Laptopi</u></i></b></a></li>
                                <li><a href="{{route('racunalaAdmin')}}"><b><i><u>Računala</u></i></b></a></li>
                                <li><a href="{{route('opremaAdmin')}}"><b><i><u>Oprema</u></i></b></a></li>
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
            </div> <!-- /.container -->
        </section> <!-- /#header -->

    <!-- Proizvodi -->
    
    <section id="dodajProizvod">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="pomLaptop">
                        <button id="dLaptop" class="btn btn-default btn-robot">Laptop</button>
                        <div class="dodajLaptop">
                            <form action="{{route('dodajLaptop')}}" method="POST"> 
                                <label for="na" class="svakiLabel">
                                    Slika laptopa:<br>
                                    <input type="text" name="slikaLaptopa">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Uvecana slika laptopa:<br>
                                    <input type="text" name="uvecanaSlikaLaptopa">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Naziv laptopa: <br>
                                    <input type="text" name="nazivLaptopa">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    CPU laptopa: <br>
                                    <input type="text" name="cpu">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    RAM laptopa: <br>
                                    <input type="text" name="ram">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Memorija laptopa: <br>
                                    <input type="text" name="memorija">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Grafička laptopa: <br>
                                    <input type="text" name="graficka">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Cijena laptopa: <br>
                                    <input type="text" name="cijenaLaptopa">
                                </label><br>
                                <hr>
                                <div class="dodaj">
                                    <button class="btn btn-default btn-robot">Dodaj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pomRacunalo">
                        <button id="dRacunalo" class="btn btn-default btn-robot">Računalo</button>
                        <div class="dodajRacunalo">
                            <form action="{{route('dodajRacunalo')}}" method="POST">
                                <label for="na" class="svakiLabel">
                                    Slika računala: <br>
                                    <input type="text" name="slikaRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Uvecana slika računala: <br>
                                    <input type="text" name="velikaSlikaRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Naziv računala: <br>
                                    <input type="text" name="nazivRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    CPU računala: <br>
                                    <input type="text" name="cpuRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    RAM računala: <br>
                                    <input type="text" name="ramRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Memorija računala: <br>
                                    <input type="text" name="memorijaRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Grafička računala: <br>
                                    <input type="text" name="grafickaRac">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Cijena računala: <br>
                                    <input type="text" name="cijenaRac">
                                </label>
                                <hr>
                                <div class="dodaj">
                                    <button class="btn btn-default btn-robot">Dodaj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pomOprema">
                        <button id="dOprema" class="btn btn-default btn-robot">Oprema</button>
                        <div class="dodajOpremu">
                            <form action="{{route('dodajOpremu')}}" method='POST'>
                                <label for="na" class="svakiLabel">
                                    Slika proizvoda: <br>
                                    <input type="text" name="slika">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Uvećana slika proizvoda: <br>
                                    <input type="text" name="velikaSlika">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Naziv proizvoda i opis: <br>
                                    <input type="text" name="naziv">
                                </label><br>
                                <hr>
                                <label for="na" class="svakiLabel">
                                    Cijena proizvoda: <br>
                                    <input type="text" name="cijena">
                                </label><br>
                                <hr>
                                
                                <div class="dodaj">
                                    <button class="btn btn-default btn-robot">Dodaj</button>
                                </div>
                            </form>
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
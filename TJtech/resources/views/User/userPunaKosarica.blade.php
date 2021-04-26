<?php
    use App\Http\Controllers\ProizvodiController;
    $ukupanBrojProizvoda=ProizvodiController::brojProizvodaUKosari();
    $ukupnaCijena=ProizvodiController::ukupnaCijenaProizvodaUKosarici();
    
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
                        <a href="userIndex.html"><img src="assets/images/logo.png" alt="logo"></a>
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
                                <li><a href="userIndex.html">Početna</a></li>
                                <li><a href="userOnama.html">O nama</a></li>
                                <li><a href="userLaptopi.html"><b><i><u>Laptopi</u></i></b></a></li>
                                <li><a href="userRacunala.html"><b><i><u>Računala</u></i></b></a></li>
                                <li><a href="userOprema.html"><b><i><u>Oprema</u></i></b></a></li>
                                <li><a href="assets\TJ-tech, vizija.pdf">Vizija</a></li>
                                <li><span class="ion-android-cart btn btn-default"style="margin-top: 10px; cursor: default;">
                                    @if($ukupanBrojProizvoda>0)
                                        <a href="{{route('kosara')}}"> {{$ukupanBrojProizvoda}} proizvoda </a>
                                        @else
                                        <a href="{{route('praznaKosara')}}"> {{$ukupanBrojProizvoda}} proizvoda </a>
                                    @endif
                                        </span>
                                    </span>
                                </li>
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
            </div>
        </section>

        <!-- Proizvodi u Kosarici -->
        
        
        <section id="Kosarica">
            <div class="container">
                <div class="table-responsive">
                    <table class="tabla">
                        <!--<span class="opcijeProizvoda"><h3>Naziv Proizvoda - Cijena</h3><h3>Količina</h3><h3>Ukloni - Dodaj</h3></span>-->
                        <tr>
                            <th>Naziv Proizvoda</th>
                            <th>Cijena</th>
                            <th>Količina</th>
                            <th colspan="2">Ukloni - Dodaj</th>
                        </tr>
                        @foreach($PodaciKosaraUser as $item)    
                        <tr>          
                            <div class="row">
                                <div class="PunaKosara">
                                    <div class="Proizvodi">
                                        <td>{{$item->Naziv_proizvoda}}</td>
                                        <td style="text-align: center;">{{$item->Cijena*$item->Kolicina}} KM</td>
                                        <td class="kolicina">{{$item->Kolicina}}</td>
                                    </div>
                                    <div class="Gumbi">
                                        <td class="jedan"> 
                                            <form action="{{route('ukloniJedanProizvod',$item->proizvod_id)}}" method="GET">
                                            <!-- <a href="{{route('ukloniJedanProizvod',$item->kosarica_id)}}" class="fas fa-minus-circle"></a>-->
                                                <button  class="fas fa-minus-circle">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('dodajJedan',$item->proizvod_id)}}" method="POST">
                                                <!--<a href="{{route('dodajJedan',$item->proizvod_id)}}" class="fas fa-plus-circle"></a>-->
                                                <button  class="fas fa-plus-circle">
                                            </form>
                                            <!--<button  class="fas fa-minus-circle"></a><button  class="fas fa-plus-circle">-->
                                            <!--<a href="/removecart/{{$item->kosarica_id}}" class="fas fa-minus-circle"></a><!--<button  class="fas fa-minus-circle"></a><button  class="fas fa-plus-circle">-->
                                        </td>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-sm-8 col-sm-offset-2 text-left">
                    <div class="nacinPlacanja">
                        <form action="{{route('buy')}}" method="POST" >
                         @csrf
                            <div class="radioBox">
                                <h3>Način plaćanja:</h3>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="myRadioId1" class="radio">
                                            <input type="radio" value="MasterCard" name="myRadioField" id="myRadioId1" class="radio__input">
                                            <div class="radio__radio"></div>
                                            Master Card
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="myRadioId2" class="radio">
                                            <input type="radio" value="Visa" name="myRadioField" id="myRadioId2" class="radio__input">
                                            <div class="radio__radio"></div>
                                            Visa
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="myRadioId3" class="radio">
                                            <input type="radio" value="Maestro" name="myRadioField" id="myRadioId3" class="radio__input">
                                            <div class="radio__radio"></div>
                                            Maestro
                                        </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="myRadioId4" class="radio">
                                            <input type="radio" value="AmericanExpress" name="myRadioField" id="myRadioId4" class="radio__input">
                                            <div class="radio__radio"></div>
                                            American Express
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="adress">
                                <div class="row">
                                    <label for="adresInput">
                                        Adresa: 
                                        <input type="text" id="adresInput" name="address">
                                    </label>
                                </div>
                            </div>
                            <div class="Kupi">
                                <h2>Ukupna cijena proizvoda u košarici: <u>{{$ukupnaCijena}}</u> KM</h2>
                                <button class="btn btn-default btn-robot">Kupi
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!--<span class="Kupi"><h2>Ukupna cijena proizvoda u košarici: <u>{{$ukupnaCijena}}</u> KM</h2><button class="btn btn-default btn-robot">Kupi</span>-->
        </section>
        
       
    <!-- Footer -->
        <section id="footer-widget" class="footer-widget" style="padding: 20px 0;">
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
                    <div class="col-sm-4"><!--userOnama.html-->
                        <h3>Korisne informacije</h3>
                        <ul>
                            <li><a href="userOnama.html">O nama</a></li>
                            <li><a href="assets\TJ-tech, vizija.pdf">Vizija</a></li>
                            <li><a href="userIndex.html">Početna</a></li>
                            <li><a href="userLaptopi.html">Laptopi</a></li>
                            <li><a href="userRacunala.html">Računala</a></li>
                            <li><a href="userOprema.html">Oprema</a></li>
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
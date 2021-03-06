<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TJ-tech | NemaProizvoda</title>

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
<body style="background-color: white;">
    <div class="nema">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 left">
                    <h1 style="margin: 0; padding: 0; margin-top: 20px;">
                        Hvala Vam!<br>
                        Vaš proizvod bi uskoro trebao doći na Vaša vrata!
                        <a href="{{route('userProfile')}}">Početna</a>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 center">
                    <img src="{{ asset('assets/images/succes.png') }}" class="img-responsive img-circle" style="margin: auto;">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
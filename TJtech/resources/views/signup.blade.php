<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    <title>Signup</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form class="box" action="{{route('spremi')}}" method="POST">
            @csrf<!--- ovo je nesto za kolacice, nemoj ovo dirat --->
                <h1>
                    Signup
                </h1>
                <input type="text" name="ime" placeholder="Ime & Prezime" id="name" value="{{old('ime')}}" required>
                <input type="text" name="email" placeholder="Upišite E-mail" id="E-mail" value="{{old('email')}}" required>
                <input type="password" name="lozinka" placeholder="Upišite lozinku" id="password" required>
                <input type="password" name="potvrda" placeholder="Potvrdite lozinku" id="confirm-password" required>
                <input type="submit" name="signup-submit" value="Potvrdi" id="submit">
                <h4>Već imate račun? <a href="login.html">Login</a></h4>
            </form>
        </div>
    </div>

    <!-- Scripts -->
        <script  src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
        <script  src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script  src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script  src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script  src="{{ asset('assets/js/script.js') }}"></script>
    
</body>
</html>
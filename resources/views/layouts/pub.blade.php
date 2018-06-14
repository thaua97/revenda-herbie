<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link 
        type="text/css" 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"  
        media="screen,projection"
    />
    <style>
        .bgnv{
            background: linear-gradient(45deg, #6600cc 0%, #a64dff 100%);
        }
    </style>
</head>
<body>
    <nav class="bgnv">
        <div class="container nav-wrapper">
            <a href="/site/" class="brand-logo">Revenda <strong>Herbie</strong></a>
        </div>
    </nav>
    <div id="app">
        @yield('page')
    </div>
    <footer class="page-footer bgnv">
        <div class="container">
            <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4"></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="">Link 4</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2018 Revenda Herbie - <strong>Thauã Borges</strong>
            <a class="grey-text text-lighten-4 right" href="https://github.com/thaua97">Git Hub</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script 
        type="text/javascript" 
        src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"
    >
    </script>
</body>
</html>

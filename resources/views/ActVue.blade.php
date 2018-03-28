<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.laravel={csrfToken:'{{csrf_token()}}'}</script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<nav>
    <ul class="fancyNav">
        <li id="laureat"><a href="/vueApp" style="width:50%" class="w3-bar-item w3-button w3-mobile ">Gestion des Laureats</a>
        </li>
        <li id="actualite"><a href="/">actualité</a></li>
        <li id="login"><a href="#about">Login</a></li>
        <li id="contact"><a href="#services">Contact</a></li>
    </ul>
</nav>
<h1 class="fancyNavv">Gestion des Actualités</h1>

<section id="app">

</section>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/vee-validate.js') }}"></script>

<!-- unpkg -->
<script src="https://unpkg.com/vee-validate@2.0.0-rc.7"></script>
</body>
</html>
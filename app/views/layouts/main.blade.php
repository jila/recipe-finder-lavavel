<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>What to cook!!!</title>
        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
    </head>
    <body>
        <div class="container center-block">
            @yield('content')
        </div> 
        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-2.1.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
    <body>
</html>

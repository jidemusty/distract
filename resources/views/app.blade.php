<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Distract</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/app.css" type="text/css" />
    </head>
    <body>
        <section class="menu">
            <h1 class="logo">Distract</h1>
            @include('partials._navigation')
        </section>
        <section>
            @yield('content')
        </section>
    </body>
</html>
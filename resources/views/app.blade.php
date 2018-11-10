<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Distract</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/app.css" type="text/css" />
    </head>
    <body>
        <div id="app">
            <section class="menu">
                <h1 class="logo">Distract</h1>
                @include('partials._navigation')
            </section>
            <section>
                @yield('content')
            </section>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
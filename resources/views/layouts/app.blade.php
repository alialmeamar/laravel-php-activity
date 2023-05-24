<link rel="stylesheet" href="/css/loading.css">
-
<div class="lding">
        ...
</div>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="/css/main.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
  <body >


    <div id="app">




            @yield('content')
        </div>
    </body>
    </html>



    <script>


        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            document.getElementById("rside").style.position = "fixed";
            document.getElementById("rside").style.width = "100%";
            document.getElementById("rside").style.display = "none";
            var x = 0;
        } else {
            var x = 1;
            document.getElementById("rsidee").style.display = "none";
        }

            function openNav() {
                if (x % 2 == 0) {
                    document.getElementById("rside").style.display = "block";

                    x = x + 1;
                } else {
                    document.getElementById("rside").style.display = "none";

                    x = x + 1;
                }


            }

            function closeNav() {


                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    document.getElementById("rside").style.display = "none";

                    x = x + 1;
                }

            }

            var def_colormod = 1 ;
            if (def_colormod == 1 ) {
                document.documentElement.style.setProperty('--dark', '#ffffff');
                document.documentElement.style.setProperty('--dark_bg', '#f3f6fd');
                document.documentElement.style.setProperty('--light', '#000000');
            }else{
                document.documentElement.style.setProperty('--dark', '#444444');
                    document.documentElement.style.setProperty('--dark_bg', '#242424');
                    document.documentElement.style.setProperty('--light', '#ffffff');
                   d = d + 1;
            }
            var d = 0;
            function darklight() {
                if (d % 2 == 1) {
                    document.documentElement.style.setProperty('--dark', '#ffffff');
                    document.documentElement.style.setProperty('--dark_bg', '#f3f6fd');
                    document.documentElement.style.setProperty('--light', '#000000');



                    d = d + 1;
                } else {
                    document.documentElement.style.setProperty('--dark', '#444444');
                    document.documentElement.style.setProperty('--dark_bg', '#242424');
                    document.documentElement.style.setProperty('--light', '#ffffff');
                   d = d + 1;
                }


            }
        </script>

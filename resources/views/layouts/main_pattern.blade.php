<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личные данные</title>
    <!--styles-->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
        .btn {
            font-size: 20px;
        }
    </style>
    @yield('css')
</head>

@include('layouts.navigation')

<body class="booking" style="background-color: #E2C5C5; background-image: url('/img/bg.jpg')">

<div class="wrap">

    <div class="content">
                @yield('content')
        <footer class="footer">
            <p>© Прізвище, 2016</p>
        </footer>
    </div>
</div>



@yield('js')
</body>

</html>
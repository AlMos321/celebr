<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личные данные</title>

    <!-- fonts -->
    <link rel="stylesheet" href="fonts/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!--styles-->

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body class="cabinet">

<div class="wrap">

    <header class="header">
     @include('layouts.navigation')

        <nav class="profile-nav">
            <ul>
                <li><a href="{{url('/personal-data')}}">Личные данные</a></li>
                <li><a href="{{url('/profile-notes')}}">Мои записи</a></li>
                <li class="active"><a href="{{url('/delivering')}}">Рассылка</a></li>
                <li><a href="{{url('/logout')}}">Выход</a></li>
            </ul>
        </nav><!-- /profile-nav -->
    </header>

    <div class="content delivering">
        <p>
            Подпишитесь на рассылку, чтобы первыми узнавать об акциях и специальных предложениях от Space Studio.
        </p>
        <form action="{{url('/delivering/phone')}}" id="delivery_form">
            <ul>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <li><input type="checkbox" @if($delivering->deliver_phone == 1)checked @endif id="mobile-delivery"><label for="mobile-delivery">Согласиться на рассылку по мобильному телефону</label></li>
                <li><input type="checkbox" @if($delivering->deliver_email == 1)checked @endif  id="mail-delivery"><label for="mail-delivery">Согласиться на рассылку по email</label></li>
            </ul>
        </form>
    </div> <!--/ content-->

    <footer class="footer">
        <nav class="social">
            <ul>
                <li><a href="#"><i class="fa fa-vk"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </nav>

        <nav class="lang-nav">
            <ul>
                @include('layouts.language')
                {{--<li class="active"><a href="#">Рус</a></li>
                <li><a href="#">Eng</a></li>--}}
            </ul>
        </nav>
    </footer>
</div><!--/wrap-->


<!--Scripts-->
<!--<script src="js/jquery-1.11.3.min.js"></script>	 -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="js/main.js"></script>

<script>

    $( "#mobile-delivery" ).click(function() {
        var data = $( "#delivery_form" ).serialize()
        console.log(data);
        $.ajax({
            url: '{{url('/delivering/phone')}}',  // указываем URL
            type: "post",
            data: data,
            success: function (data, textStatus) {

            }
        });
    });

    $( "#mail-delivery" ).click(function() {
        var data = $( "#delivery_form" ).serialize()
        $.ajax({
            url: '{{url('/delivering/email')}}',  // указываем URL
            type: "post",
            data: data,
            success: function (data, textStatus) {

            }
        });
    });

</script>
@include('layouts.main')
</body>
</html>
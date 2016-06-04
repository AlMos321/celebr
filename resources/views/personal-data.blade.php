
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>

<body class="cabinet" style="background-color: #F1F1F1;">

<div class="wrap">

    <header class="header">

        @include('layouts.navigation')
        {{--<nav class="top-navbar">
            <span class="burger">
                <span></span>
            </span>
            <a class="profile-link" href="#">Личный кабинет</a>
            <a href="{{url('/')}}" class="logo"><img src="img/logo.png" alt="Space studio logo">Space studio</a>
            <ul class="main-nav">
                <li><a href="{{url('rooms')}}">Залы</a></li>
                <li class="reservation"><a href="{{url('booking')}}">Забронировать</a></li>
                <li><a href="{{url('contacts')}}">Контакты</a></li>
            </ul>

        </nav> --}}
        <!-- /main-nav -->

        <nav class="profile-nav">
            <ul>
                <li class="active"><a href="{{url('personal-data')}}">Личные данные</a></li>
                <li><a href="{{url('/profile-notes')}} ">Мои записи</a></li>
                <li><a href="{{url('delivering')}}">Рассылка</a></li>
                <li><a href="{{url('/logout')}}">Выход</a></li>
            </ul>
        </nav><!-- /profile-nav -->
    </header>

    <div class="content personal-data">
        <form action="{{url('/personal-data/update')}}" method="post" id="personal_data_form">
            {!! csrf_field() !!}
            <fieldset>
                <legend></legend>
                <ul>
                    <div class="error error-name hide">Введите имя</div>
                    <li><input name="name" class="input-style" type="text" placeholder="Имя" value="@if(isset($user)){{$user->name}}@endif"></li>
                    <div class="error error-surname hide">Введите фамилия</div>
                    <li><input name="surname" class="input-style" type="text" placeholder="Фамилия" value="@if(isset($user)){{$user->surname}}@endif"></li>
                    <div class="error error-email hide">Введите емейл</div>
                    <li><input name="email" class="input-style" type="email" placeholder="Email" value="@if(isset($user)){{$user->email}}@endif"></li>
                    <div class="error error-phone hide">Введите телефон</div>
                    <li><input name="phone" class="input-style" type="text" placeholder="Телефон" value="@if(isset($user)){{$user->phone}}@endif"></li>
                </ul>

            </fieldset>

            @if(Auth::check() && (empty(Auth::User()->facebook_id) && empty(Auth::User()->vk_id)))
            <fieldset>
                <legend></legend>
                <p class="new-password">Поменять пароль</p>
                <ul class="password-form">
                    <div class="error error-old-pass hide">Введите телефон</div>
                    <li><input name="old-pass" class="input-style" type="password" placeholder="Старый пароль"></li>
                    <div class="error error-new-pass hide">Введите телефон</div>
                    <li><input name="new-pass" class="input-style" type="password" placeholder="Новый пароль"></li>
                    <div class="error error-new-re-pass hide">Введите телефон</div>
                    <li><input name="new-re-pass" class="input-style" type="password" placeholder="Еше раз новый пароль"></li>
                </ul>
            </fieldset>
            @endif
            <footer>
                <button class="btn blue">Сохранить</button>
            </footer>
        </form>
    </div> <!-- content -->

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

@include('layouts.main')

<script>
    $( "#personal_data_form" ).submit(function( event ) {
        $('.error').addClass('hide');
        var data = $( "#personal_data_form" ).serialize()
        console.log(data);
        $.ajax({
            url: '{{url('/personal-data/update')}}',  // указываем URL
            type: "post",
            data: data,
            success: function (data, textStatus) {
                console.log(data);
                if (typeof data !== 'object'){
                    $('#personal_data_form')[0].reset();
                    $('.error').addClass('hide');
                    document.location.reload(true);
                } else {
                    if (typeof  data.name !== 'undefined'){
                        $('.error-name').removeClass('hide')
                        $('.error-name').html(data.name[0])
                    }
                    if (typeof  data.surname !== 'undefined'){
                        $('.error-surname').removeClass('hide')
                        $('.error-surname').html(data.surname[0])
                    }
                    if (typeof  data.email !== 'undefined'){
                        $('.error-email').removeClass('hide')
                        $('.error-email').html(data.email[0])
                    }
                    if (typeof  data.phone !== 'undefined'){
                        $('.error-phone').removeClass('hide')
                        $('.error-phone').html(data.phone[0])
                    }
                    if (typeof  data['new-pass'] !== 'undefined'){
                        $('.error-new-pass').removeClass('hide')
                        $('.error-new-pass').html(data['new-pass'][0])
                    }
                    if (typeof  data['new-re-pass'] !== 'undefined'){
                        $('.error-new-re-pass').removeClass('hide')
                        $('.error-new-re-pass').html(data['new-re-pass'][0])
                    }
                    if (typeof  data['old-pass'] !== 'undefined'){
                        $('.error-old-pass').removeClass('hide')
                        $('.error-old-pass').html(data['old-pass'][0])
                    }
                }
            }
        });
        event.preventDefault();
    });
</script>

</body>
</html>
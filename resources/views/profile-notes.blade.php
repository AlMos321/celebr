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
    <link rel="stylesheet" href="css/modals.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body class="cabinet" style="background-color: #F1F1F1;">

<div class="wrap">

    <header class="header">
        @include('layouts.navigation')
      {{--  <nav class="top-navbar">
            <span class="burger">
                <span></span>
            </span>
            <a class="profile-link" href="#">Личный кабинет</a>
            <a href="{{url('/')}}" class="logo"><img src="img/logo.png" alt="Space studio logo">Space studio</a>
            <ul class="main-nav">
                <li><a href="{{url('/rooms')}}">Залы</a></li>
                <li class="reservation"><a href="{{url('/booking')}}">Забронировать</a></li>
                <li><a href="{{url('contacts')}}">Контакты</a></li>
            </ul>
        </nav> <!-- /main-nav -->
--}}
        <nav class="profile-nav">
            <ul>
                <li><a href="{{url('/personal-data')}}">Личные данные</a></li>
                <li class="active"><a href="{{url('/profile-notes')}}">Мои записи</a></li>
                <li><a href="{{url('/delivering')}}">Рассылка</a></li>
                <li><a href="{{url('/logout')}}">Выход</a></li>
            </ul>
        </nav><!-- /profile-nav -->
    </header>

    <div class="content profile-notes">
        <form action="/order/delete" method="post">

            <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}" />

            @if(!empty($times))
            <div class="table">
                <div class="thead">
                    <div class="col date">Дата</div>
                   {{-- <div class="col time">Время</div>--}}
                    <div class="col cost">Вартість</div>
                </div> <!-- /thead -->
                <div class="tbody">
             @endif
                @foreach($times as $time)
                    <input type="hidden" name="id" value="{{ $time->id }}" />
                    <div class="row">
                        <div class="col date"><p>{{date('d-m-Y', $time->time)}}</p></div>
                       {{-- <div class="col time">
                            <ul>
                                <li>{{date('H', $time->time)}} - {{date('H',strtotime("+1 hour", $time->time))}}</li>
                            </ul>
                        </div>--}}
                        <div class="col cost">{{$time->cost}} ГРН</div>
                        <div class="col canceled"><button class="deleteTime" id="{{$time->id}}">Відміна заказу</button></div>
                    </div><!--/ row -->
                    @endforeach
             @if(!empty($times))
                </div><!-- /tbody -->
            </div>
            @endif
            <footer>
                {{--<button class="btn blue">Сохранить</button>--}}
            </footer>
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

<!-- modals	 -->
<div class="modal-backdrop"></div>
<div class="modal delete-note">
    <header>
        <a href="#" class="cls-btn">&times;</a>
    </header>

    <section>
        <p>Вы действительно хотите удалить бронирование?</p>
    </section>

    <footer>
        <ul class="btns-list">
            <li><button class="btn grey accept">Да</button></li>
            <li><button class="btn declain">Нет</button></li>
        </ul>
    </footer>
</div>

<!--Scripts-->
<!--<script src="js/jquery-1.11.3.min.js"></script>	 -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="js/main.js"></script>

<script>
    $(".deleteTime").on('click', function(e){
        var id = $(this).attr('id');
        var _token = $('#_token').attr('value');
        event.preventDefault();
        $.ajax({
            url: '{{url('/order/delete')}}',  // указываем URL
            type: "post",
            data: {id: id, _token: _token},
            success: function (data, textStatus) {
                location.reload();
            }
        });
    });
</script>


@include('layouts.main')
</body>
</html>
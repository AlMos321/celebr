<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личные данные</title>

    <link rel="stylesheet" href="css/animate.css">

    <!--styles-->
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/media.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <style>
        .btn {
            font-size: 20px;
        }
    </style>
</head>
@include('layouts.navigation')

<body class="booking" {{--style="background-color: #E2C5C5;"--}}>

<div class="wrap">

    <div class="content">
        @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
            <button type="button" id="add_employe" class="btn btn-primary">Додати заклад</button>
        @endif
        <table class="table" style="background-color: #white">
            <caption>Таблиця закладів.</caption>
            <thead>
            <tr>
                <th>Назва</th>
                <th>Адреса</th>
                <th>Опис</th>
                <th>Дія</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $s)
                <tr>
                    <td style="cursor: pointer;" onclick="changeShop({{$s->id}})">{{$s->name}}</td>
                    <td>{{$s->addres}}</td>
                    <td>{{$s->description}}</td>
                    <td onclick="dellShop({{$s->id}})">
                        @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
                            <span style="cursor: pointer;" class="glyphicon glyphicon-remove"></span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!--/ content-->

    <footer class="footer">
        <p>© Прізвище, 2016</p>
    </footer>
</div>

<!-- /register-modal -->

@include('forms.recovery')

<div class="modal booking-modal">
    <header>
        <h4>Время успешно забронировано!</h4>
        <a href="#" class="cls-btn">&times;</a>
    </header>
    <section>
        <p>Заказ добавлен в список <br></p>
    </section>
    <footer>
        @if(Auth::check())
            <a href="{{url('/admin/orders')}}" class="btn" type="submit">Перейти в личный кабинет</a>
        @else
            <a href="{{url('/')}}" class="btn" type="submit">Перейти на главную страницу</a>
        @endif
    </footer>
</div>

<!-- Modal -->
<div class="modal fade" id="myModalCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Форма редагування закладів</h4>
            </div>
            <div class="modal-body">
                <form class="form-group" method="post" id="submit-post" action="/create/shop">
                    {!! csrf_field() !!}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Назва</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Для свята</label>
                        <select class="form-control" id="hol_id" name="hol_id">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Адреса</label>
                        <input type="text" class="form-control" id="addres" name="addres">
                    </div>
                    <div class="form-group">
                        <label>Опис</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
                        <button type="submit" class="btn btn-default">Сохранить</button>
                    @endif
                </form>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<!--Scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>

<script>
    token = $('input[name="_token"]').val();

    $( document ).ready(function() {

    });

    $('#add_employe').on('click', function () {
        loadHolidays();
        $('#submit-post').trigger('reset');
        $('#myModalCategory').modal('show');
    });

    $('#submit-post').on('submit', function (e) {
        e.preventDefault();
        $('#btn-post').attr('disabled','disabled');
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: '/create/shop',
            type: "post",
            data: data,
            success: function (data, textStatus) {
                location.reload();
            }
        });
    });

    function loadHolidays(selectedOpt) {
        $.ajax({
            url: '/load/holidays',
            type: "post",
            data: {_token: token},
            success: function (data) {
                $.each(data, function(index, value){
                    if(selectedOpt == value.id){
                        $('#hol_id').append('<option selected value="'+value.id+'">'+value.name+'</option>')
                    } else {
                        $('#hol_id').append('<option value="'+value.id+'">'+value.name+'</option>')
                    }
                });
            }
        });
    }

    function changeShop(id) {
        $.ajax({
            url: '/change/shop',
            type: "post",
            data: {_token: token, id: id},
            success: function (data, textStatus) {
                $('#submit-post').trigger('reset');
                $("#hol_id").empty();
                $('input#id').val(data.id);
                $('input#name').val(data.name);
                $('#description').val(data.description);
                $('input#addres').val(data.addres);
                $('#myModalCategory').modal('show');
                loadHolidays(data.hol_id);
            }
        });
    }

    function dellShop(id) {
        $.ajax({
            url: '/delete/shop',
            type: "post",
            data: {_token: token, id: id},
            success: function (data, textStatus) {
                location.reload();
            }
        });
    }
</script>


</body>
</html>
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
            <button type="button" id="add_employe" class="btn btn-primary">Додати працівника</button>
        @endif
        <table class="table" style="background-color: white">
            <caption>Таблиця працівників.</caption>
            <thead>
            <tr>
                <th>Ім'я</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Зарплата</th>
                <th>Дія</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employes as $empl)
            <tr>
                <td style="cursor: pointer;" onclick="changeEmpl({{$empl->id}})">{{$empl->name}}</td>
                <td>{{$empl->phone}}</td>
                <td>{{$empl->email}}</td>
                <td>{{$empl->salary}}</td>
                <td onclick="dellEmpl({{$empl->id}})">
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
                <h4 class="modal-title" id="myModalLabel">Форма редагування працівників</h4>
            </div>
            <div class="modal-body">
                <form class="form-group" method="post" id="submit-post" action="/create/employe">
                    {!! csrf_field() !!}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Ім'я</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ім'я">
                    </div>
                    <div class="form-group">
                        <label>Посада</label>
                        <select class="form-control" id="type_id" name="type_id">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Телефон</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <label>Заробітна плата</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Плата">
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
        loadCategories();
        $('#submit-post').trigger('reset');
        $('#myModalCategory').modal('show');
    });

    $('#submit-post').on('submit', function (e) {
        e.preventDefault();
        $('#btn-post').attr('disabled','disabled');
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: '/create/employe',
            type: "post",
            data: data,
            success: function (data, textStatus) {
                location.reload();
            }
        });
    });

    function loadCategories(selectedOpt) {
        $.ajax({
            url: '/load/categories',
            type: "post",
            data: {_token: token},
            success: function (data) {
                $.each(data, function(index, value){
                    if(selectedOpt == value.id){
                        $('#type_id').append('<option selected value="'+value.id+'">'+value.name+'</option>')
                    } else {
                        $('#type_id').append('<option value="'+value.id+'">'+value.name+'</option>')
                    }
                });
            }
        });
    }

    function changeEmpl(id) {
        $.ajax({
            url: '/change/employe',
            type: "post",
            data: {_token: token, id: id},
            success: function (data, textStatus) {
                $('#submit-post').trigger('reset');
                $("#type_id").empty();
                $('input#id').val(data.id);
                $('input#name').val(data.name);
                $('input#email').val(data.email);
                $('input#phone').val(data.phone);
                $('input#salary').val(data.salary);
                $('#myModalCategory').modal('show');
                loadCategories(data.cat_id);
            }
        });
    }

    function dellEmpl(id) {
        $.ajax({
            url: '/delete/employe',
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
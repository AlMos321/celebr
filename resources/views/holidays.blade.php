@extends('layouts.main_pattern')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
        <button type="button" id="add_employe" class="btn btn-primary">Додати свято</button>
    @endif
    <table class="table" style="background-color: white">
        <caption>Таблиця свят.</caption>
        <thead>
        <tr>
            <th>Назва</th>
            <th>Опис</th>
            <th>Ціна</th>
            <th>Дія</th>
        </tr>
        </thead>
        <tbody>
        @foreach($holidays as $hol)
            <tr>
                <td style="cursor: pointer;" onclick="changeHol({{$hol->id}})">{{$hol->name}}</td>
                <td>{{$hol->description}}</td>
                <td>{{$hol->cost}}</td>
                <td onclick="dellHol({{$hol->id}})">
                    @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
                        <span style="cursor: pointer;" class="glyphicon glyphicon-remove"></span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="myModalCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Форма редагування свят</h4>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="post" id="submit-post" action="/create/employe">
                        {!! csrf_field() !!}
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label>Назва</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Ціна(за годину)</label>
                            <input type="text" class="form-control" id="cost" name="cost" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Тип</label>
                            <select class="form-control" id="options" name="options">
                                <option value="chil">Дитячі</option>
                                <option value="adu">Дорослі</option>
                                <option value="salute">Салюти</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Опис</label>
                            <textarea class="form-control" id="description" name="description" rows="10"></textarea>
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
    @endsection

    @section('js')
    <!--Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
            integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script>
        token = $('input[name="_token"]').val();

        $( document ).ready(function() {

        });

        $('#add_employe').on('click', function () {
            //loadCategories();
            $('#submit-post').trigger('reset');
            $('#myModalCategory').modal('show');
        });

        $('#submit-post').on('submit', function (e) {
            e.preventDefault();
            $('#btn-post').attr('disabled','disabled');
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                url: '/create/holiday',
                type: "post",
                data: data,
                success: function (data, textStatus) {
                    location.reload();
                }
            });
        });

        /*function loadCategories(selectedOpt) {
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
        }*/

        function changeHol(id) {
            $.ajax({
                url: '/change/holiday',
                type: "post",
                data: {_token: token, id: id},
                success: function (data, textStatus) {
                    $('#submit-post').trigger('reset');
                    $('input#id').val(data.id);
                    $('input#name').val(data.name);
                    $('#description').val(data.description);
                    $('input#cost').val(data.cost);
                    $('#myModalCategory').modal('show');
                    $('#options option[value='+data.options+']').prop("selected", true);
                }
            });
        }

        function dellHol(id) {
            $.ajax({
                url: '/delete/holiday',
                type: "post",
                data: {_token: token, id: id},
                success: function (data, textStatus) {
                    location.reload();
                }
            });
        }
    </script>

@endsection

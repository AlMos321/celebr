@extends('layouts.main_pattern')

@section('content')
        <form action="{{url('/order/create')}}" role="form" method="post" id="order_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>


            <section class="main-field">
                <fieldset class="types-option">
                    <h2>Выберите тип бронирования</h2>
                    <ul class="btns-list">
                        <li><input type="radio" id="chil" class="type_brn" name="type" value="chil"><label class="btn"
                                                                                                  for="chil">Дитячі свята</label>
                        </li>
                        <li><input type="radio" id="adu" class="type_brn" name="type" value="adu"><label class="btn" for="adu">Дорослі свята</label>
                        </li>
                        <li><input type="radio" id="slut" class="type_brn" name="type" value="slut"><label class="btn" for="slut">Салюти</label>
                        </li>
                    </ul>
                </fieldset>

                <fieldset class="rooms-option">
                    <h2>Вибір послуги</h2>
                    <select class="form-control" id="hol_type" name="hol_type">
                        @foreach($holidays as $hol)
                        <option id="{{$hol->id}}" value="{{$hol->id}}">{{$hol->name}}</option>
                        @endforeach
                    </select>

                    <h3>Рекомендовані заклади</h3>
                    <select class="form-control" id="shop_type" name="shop_type">

                    </select>

                </fieldset>

                <div class="error error-timeList hide">Выберите время</div>
                <fieldset class="datetime-picker">
                    <h2 style="text-align: center;">
                        <span class="month">декабрь</span>
                        <span class="year">2015</span>
                    </h2>
                    <section>
                        <ul class="time-section animated fadeInLeft" style="margin-bottom: 0px;">
                            <li>Зміна 1</li>
                            <li>Зміна 2</li>
                            <li>Зміна 3</li>
                        </ul>
                        <section class="picker-field">

                            <div class="day-nav clearfix">
                                <a href="#" class="arrows left"></a>
                                <a href="#" class="arrows right"></a>
                                <ul class="animated fadeInDown">
                                    <li class="active">Пн<span id="monday">01</span></li>
                                    <li>Вт<span id="tuesday">02</span></li>
                                    <li>Ср<span id="wednesday">03</span></li>
                                    <li>Чт<span id="thursday">04</span></li>
                                    <li>Пт<span id="friday">05</span></li>
                                    <li>Сб<span id="saturday">06</span></li>
                                    <li>Вт<span id="sunday">07</span></li>
                                </ul>
                            </div>

                            <div class="days-field animated fadeIn">
                                <ul>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" name="123456" id="checkbox-1"><label
                                                        for="checkbox-1"></label></li>
                                            <li><input type="checkbox" id="checkbox-2"><label for="checkbox-2"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-3"><label class="without-pay"
                                                                                              for="checkbox-3"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-4"><label for="checkbox-4"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-5"><label for="checkbox-5"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-6"><label for="checkbox-6"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-7"><label for="checkbox-7"></label>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-8"><label for="checkbox-8"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-9"><label for="checkbox-9"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-10"><label
                                                        for="checkbox-10"></label></li>
                                            <li><input type="checkbox" id="checkbox-11"><label class="without-pay"
                                                                                               for="checkbox-11"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-12"><label
                                                        for="checkbox-12"></label></li>
                                            <li><input type="checkbox" id="checkbox-13"><label
                                                        for="checkbox-13"></label></li>
                                            <li><input type="checkbox" id="checkbox-14"><label
                                                        for="checkbox-14"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-15"><label
                                                        for="checkbox-15"></label></li>
                                            <li><input type="checkbox" id="checkbox-16"><label class="without-pay"
                                                                                               for="checkbox-16"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-17"><label class="paid"
                                                                                               for="checkbox-17"></label>
                                            </li>
                                            <li><input type="checkbox" id="checkbox-18"><label
                                                        for="checkbox-18"></label></li>
                                            <li><input type="checkbox" id="checkbox-19"><label
                                                        for="checkbox-19"></label></li>
                                            <li><input type="checkbox" id="checkbox-20"><label
                                                        for="checkbox-20"></label></li>
                                            <li><input type="checkbox" id="checkbox-21"><label
                                                        for="checkbox-21"></label></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- days-field -->
                        </section>
                    </section>
                </fieldset>

            </section>
            <!--/main-field-->

                <section>
                    @if(!Auth::check())
                        <div style="text-align: center; color: red;"><p>Для того щоб залишити заявку треба <a href="/login">ввійти</a> або <a href="/register">зареєструватись</a></p></div>
                    @endif
                    <section class="contact-form" style="width: 50%; margin: 0 auto">
                        <ul>

                                <div class="error error-name hide"></div>
                                <li><label for="">Ім'я заказчика</label><input value="@if(Auth::check()){{Auth::User()->name}}@endif" class="input-style" name="name" type="text">
                                </li>

                                <div class="error error-phone hide"></div>
                                <li><label for="">Телефон заказчика</label><input class="input-style" value="@if(Auth::check()){{Auth::User()->phone}}@endif" name="phone"
                                                                                   type="text"></li>

                                <div class="error error-email hide"></div>
                                <li><label for="">Email</label><input class="input-style" value="@if(Auth::check()){{Auth::User()->email}}@endif" name="email" type="email">
                                </li>

                            <div class="error error-description hide"></div>
                            <li><label for="">Побажання</label><textarea class="input-style" name="description" id=""
                                                                          cols="30" rows="10"></textarea></li>
                        </ul>

                    </section>



                    <footer class="submit-section">
                        <button class="btn blue" id="booking-btn1"  @if(!Auth::check()) disabled @endif>Заказать</button>
                    </footer>
                </section>
            </section>
            <!--/form-sidebar-->


        </form>
@endsection

<!--/booking-modal-->

@section('js')
<!--Scripts-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/main.js"></script>


    <script>
        token = $('input[name="_token"]').val();
        $('.type_brn').on('click', function () {

            type = $(this).val();

            $.ajax({
                url: '/select/type',
                type: "post",
                data: {_token: token, type: type},
                success: function (data, textStatus) {
                    $('#hol_type').empty();
                    $('#hol_type').append('<option value="0">...</option>');
                    $.each(data, function(index, value){
                            $('#hol_type').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            });
        });

        $('#hol_type').on('change', function () {
            HolType = $(this).val();
            getShopByHolidayId(HolType)
        });

        function getShopByHolidayId(id) {
            $.ajax({
                url: '/get/shop/holiday',
                type: "post",
                data: {_token: token, id: id},
                success: function (data, textStatus) {
                    $('#shop_type').empty();
                    $('#shop_type').append('<option value="0">...</option>');
                    $.each(data, function(index, value){
                        $('#shop_type').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            });
        }


    </script>

        <script src="js/booking.js"></script>

@endsection

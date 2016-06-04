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

                <fieldset class="rooms-option" style="width: 25%;  text-align: center; margin: 0 auto;">
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

                @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
                <fieldset class="datetime-picker">
                    <h2 style="text-align: center;">
                        <span class="month">декабрь</span>
                        <span class="year">2015</span>
                    </h2>
                    <section>
                        <ul class="time-section animated fadeInLeft" style="margin-bottom: 0px;">
                            <li>00:00 - 01:00</li>
                            <li>01:00 - 02:00</li>
                            <li>02:00 - 03:00</li>
                            <li>03:00 - 04:00</li>
                            <li>04:00 - 05:00</li>
                            <li>05:00 - 06:00</li>
                            <li>06:00 - 07:00</li>
                            <li>07:00 - 08:00</li>
                            <li>08:00 - 09:00</li>
                            <li>09:00 - 10:00</li>
                            <li>10:00 - 11:00</li>
                            <li>11:00 - 12:00</li>
                            <li>12:00 - 13:00</li>
                            <li>13:00 - 14:00</li>
                            <li>14:00 - 15:00</li>
                            <li>15:00 - 16:00</li>
                            <li>16:00 - 17:00</li>
                            <li>17:00 - 18:00</li>
                            <li>18:00 - 19:00</li>
                            <li>19:00 - 20:00</li>
                            <li>20:00 - 21:00</li>
                            <li>21:00 - 22:00</li>
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
                                    <li  class="hiden">
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
                                    <li  class="hiden">
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
                                    <li  class="hiden">
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
                                    <li  class="hiden">
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-22"><label
                                                        for="checkbox-22"></label></li>
                                            <li><input type="checkbox" id="checkbox-23"><label
                                                        for="checkbox-23"></label></li>
                                            <li><input type="checkbox" id="checkbox-24"><label
                                                        for="checkbox-24"></label></li>
                                            <li><input type="checkbox" id="checkbox-25"><label
                                                        for="checkbox-25"></label></li>
                                            <li><input type="checkbox" id="checkbox-26"><label
                                                        for="checkbox-26"></label></li>
                                            <li><input type="checkbox" id="checkbox-27"><label
                                                        for="checkbox-27"></label></li>
                                            <li><input type="checkbox" id="checkbox-28"><label
                                                        for="checkbox-28"></label></li>
                                        </ul>
                                    </li>
                                    <li  class="hiden">
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-29"><label
                                                        for="checkbox-29"></label></li>
                                            <li><input type="checkbox" id="checkbox-30"><label
                                                        for="checkbox-30"></label></li>
                                            <li><input type="checkbox" id="checkbox-31"><label
                                                        for="checkbox-31"></label></li>
                                            <li><input type="checkbox" id="checkbox-32"><label
                                                        for="checkbox-32"></label></li>
                                            <li><input type="checkbox" id="checkbox-33"><label
                                                        for="checkbox-33"></label></li>
                                            <li><input type="checkbox" id="checkbox-34"><label
                                                        for="checkbox-34"></label></li>
                                            <li><input type="checkbox" id="checkbox-35"><label
                                                        for="checkbox-35"></label></li>
                                        </ul>
                                    </li>
                                    <li  class="hiden">
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-36"><label
                                                        for="checkbox-36"></label></li>
                                            <li><input type="checkbox" id="checkbox-37"><label
                                                        for="checkbox-37"></label></li>
                                            <li><input type="checkbox" id="checkbox-38"><label
                                                        for="checkbox-38"></label></li>
                                            <li><input type="checkbox" id="checkbox-39"><label
                                                        for="checkbox-39"></label></li>
                                            <li><input type="checkbox" id="checkbox-40"><label
                                                        for="checkbox-40"></label></li>
                                            <li><input type="checkbox" id="checkbox-41"><label
                                                        for="checkbox-41"></label></li>
                                            <li><input type="checkbox" id="checkbox-42"><label
                                                        for="checkbox-42"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-43"><label
                                                        for="checkbox-43"></label></li>
                                            <li><input type="checkbox" id="checkbox-44"><label
                                                        for="checkbox-44"></label></li>
                                            <li><input type="checkbox" id="checkbox-45"><label
                                                        for="checkbox-45"></label></li>
                                            <li><input type="checkbox" id="checkbox-46"><label
                                                        for="checkbox-46"></label></li>
                                            <li><input type="checkbox" id="checkbox-47"><label
                                                        for="checkbox-47"></label></li>
                                            <li><input type="checkbox" id="checkbox-48"><label
                                                        for="checkbox-48"></label></li>
                                            <li><input type="checkbox" id="checkbox-49"><label
                                                        for="checkbox-49"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-50"><label
                                                        for="checkbox-50"></label></li>
                                            <li><input type="checkbox" id="checkbox-51"><label
                                                        for="checkbox-51"></label></li>
                                            <li><input type="checkbox" id="checkbox-52"><label
                                                        for="checkbox-52"></label></li>
                                            <li><input type="checkbox" id="checkbox-53"><label
                                                        for="checkbox-53"></label></li>
                                            <li><input type="checkbox" id="checkbox-54"><label
                                                        for="checkbox-54"></label></li>
                                            <li><input type="checkbox" id="checkbox-55"><label
                                                        for="checkbox-55"></label></li>
                                            <li><input type="checkbox" id="checkbox-56"><label
                                                        for="checkbox-56"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-57"><label
                                                        for="checkbox-57"></label></li>
                                            <li><input type="checkbox" id="checkbox-58"><label
                                                        for="checkbox-58"></label></li>
                                            <li><input type="checkbox" id="checkbox-59"><label
                                                        for="checkbox-59"></label></li>
                                            <li><input type="checkbox" id="checkbox-60"><label
                                                        for="checkbox-60"></label></li>
                                            <li><input type="checkbox" id="checkbox-61"><label
                                                        for="checkbox-61"></label></li>
                                            <li><input type="checkbox" id="checkbox-62"><label
                                                        for="checkbox-62"></label></li>
                                            <li><input type="checkbox" id="checkbox-63"><label
                                                        for="checkbox-63"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-64"><label
                                                        for="checkbox-64"></label></li>
                                            <li><input type="checkbox" id="checkbox-65"><label
                                                        for="checkbox-65"></label></li>
                                            <li><input type="checkbox" id="checkbox-66"><label
                                                        for="checkbox-66"></label></li>
                                            <li><input type="checkbox" id="checkbox-67"><label
                                                        for="checkbox-67"></label></li>
                                            <li><input type="checkbox" id="checkbox-68"><label
                                                        for="checkbox-68"></label></li>
                                            <li><input type="checkbox" id="checkbox-69"><label
                                                        for="checkbox-69"></label></li>
                                            <li><input type="checkbox" id="checkbox-70"><label
                                                        for="checkbox-70"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-71"><label
                                                        for="checkbox-71"></label></li>
                                            <li><input type="checkbox" id="checkbox-72"><label
                                                        for="checkbox-72"></label></li>
                                            <li><input type="checkbox" id="checkbox-73"><label
                                                        for="checkbox-73"></label></li>
                                            <li><input type="checkbox" id="checkbox-74"><label
                                                        for="checkbox-74"></label></li>
                                            <li><input type="checkbox" id="checkbox-75"><label
                                                        for="checkbox-75"></label></li>
                                            <li><input type="checkbox" id="checkbox-76"><label
                                                        for="checkbox-76"></label></li>
                                            <li><input type="checkbox" id="checkbox-77"><label
                                                        for="checkbox-77"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-78"><label
                                                        for="checkbox-78"></label></li>
                                            <li><input type="checkbox" id="checkbox-79"><label
                                                        for="checkbox-79"></label></li>
                                            <li><input type="checkbox" id="checkbox-80"><label
                                                        for="checkbox-80"></label></li>
                                            <li><input type="checkbox" id="checkbox-81"><label
                                                        for="checkbox-81"></label></li>
                                            <li><input type="checkbox" id="checkbox-82"><label
                                                        for="checkbox-82"></label></li>
                                            <li><input type="checkbox" id="checkbox-83"><label
                                                        for="checkbox-83"></label></li>
                                            <li><input type="checkbox" id="checkbox-84"><label
                                                        for="checkbox-84"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-85"><label
                                                        for="checkbox-85"></label></li>
                                            <li><input type="checkbox" id="checkbox-86"><label
                                                        for="checkbox-86"></label></li>
                                            <li><input type="checkbox" id="checkbox-87"><label
                                                        for="checkbox-87"></label></li>
                                            <li><input type="checkbox" id="checkbox-88"><label
                                                        for="checkbox-88"></label></li>
                                            <li><input type="checkbox" id="checkbox-89"><label
                                                        for="checkbox-89"></label></li>
                                            <li><input type="checkbox" id="checkbox-90"><label
                                                        for="checkbox-90"></label></li>
                                            <li><input type="checkbox" id="checkbox-91"><label
                                                        for="checkbox-91"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-92"><label
                                                        for="checkbox-92"></label></li>
                                            <li><input type="checkbox" id="checkbox-93"><label
                                                        for="checkbox-93"></label></li>
                                            <li><input type="checkbox" id="checkbox-94"><label
                                                        for="checkbox-94"></label></li>
                                            <li><input type="checkbox" id="checkbox-95"><label
                                                        for="checkbox-95"></label></li>
                                            <li><input type="checkbox" id="checkbox-96"><label
                                                        for="checkbox-96"></label></li>
                                            <li><input type="checkbox" id="checkbox-97"><label
                                                        for="checkbox-97"></label></li>
                                            <li><input type="checkbox" id="checkbox-98"><label
                                                        for="checkbox-98"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-99"><label
                                                        for="checkbox-99"></label></li>
                                            <li><input type="checkbox" id="checkbox-100"><label
                                                        for="checkbox-100"></label></li>
                                            <li><input type="checkbox" id="checkbox-101"><label
                                                        for="checkbox-101"></label></li>
                                            <li><input type="checkbox" id="checkbox-102"><label
                                                        for="checkbox-102"></label></li>
                                            <li><input type="checkbox" id="checkbox-103"><label
                                                        for="checkbox-103"></label></li>
                                            <li><input type="checkbox" id="checkbox-104"><label
                                                        for="checkbox-104"></label></li>
                                            <li><input type="checkbox" id="checkbox-105"><label
                                                        for="checkbox-105"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-106"><label
                                                        for="checkbox-106"></label></li>
                                            <li><input type="checkbox" id="checkbox-107"><label
                                                        for="checkbox-107"></label></li>
                                            <li><input type="checkbox" id="checkbox-108"><label
                                                        for="checkbox-108"></label></li>
                                            <li><input type="checkbox" id="checkbox-109"><label
                                                        for="checkbox-109"></label></li>
                                            <li><input type="checkbox" id="checkbox-110"><label
                                                        for="checkbox-110"></label></li>
                                            <li><input type="checkbox" id="checkbox-111"><label
                                                        for="checkbox-111"></label></li>
                                            <li><input type="checkbox" id="checkbox-112"><label
                                                        for="checkbox-112"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-113"><label
                                                        for="checkbox-113"></label></li>
                                            <li><input type="checkbox" id="checkbox-114"><label
                                                        for="checkbox-114"></label></li>
                                            <li><input type="checkbox" id="checkbox-115"><label
                                                        for="checkbox-115"></label></li>
                                            <li><input type="checkbox" id="checkbox-116"><label
                                                        for="checkbox-116"></label></li>
                                            <li><input type="checkbox" id="checkbox-117"><label
                                                        for="checkbox-117"></label></li>
                                            <li><input type="checkbox" id="checkbox-118"><label
                                                        for="checkbox-118"></label></li>
                                            <li><input type="checkbox" id="checkbox-119"><label
                                                        for="checkbox-119"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-120"><label
                                                        for="checkbox-120"></label></li>
                                            <li><input type="checkbox" id="checkbox-121"><label
                                                        for="checkbox-121"></label></li>
                                            <li><input type="checkbox" id="checkbox-122"><label
                                                        for="checkbox-122"></label></li>
                                            <li><input type="checkbox" id="checkbox-123"><label
                                                        for="checkbox-123"></label></li>
                                            <li><input type="checkbox" id="checkbox-124"><label
                                                        for="checkbox-124"></label></li>
                                            <li><input type="checkbox" id="checkbox-125"><label
                                                        for="checkbox-125"></label></li>
                                            <li><input type="checkbox" id="checkbox-126"><label
                                                        for="checkbox-126"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-127"><label
                                                        for="checkbox-127"></label></li>
                                            <li><input type="checkbox" id="checkbox-128"><label
                                                        for="checkbox-128"></label></li>
                                            <li><input type="checkbox" id="checkbox-129"><label
                                                        for="checkbox-129"></label></li>
                                            <li><input type="checkbox" id="checkbox-130"><label
                                                        for="checkbox-130"></label></li>
                                            <li><input type="checkbox" id="checkbox-131"><label
                                                        for="checkbox-131"></label></li>
                                            <li><input type="checkbox" id="checkbox-132"><label
                                                        for="checkbox-132"></label></li>
                                            <li><input type="checkbox" id="checkbox-133"><label
                                                        for="checkbox-133"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-134"><label
                                                        for="checkbox-134"></label></li>
                                            <li><input type="checkbox" id="checkbox-135"><label
                                                        for="checkbox-135"></label></li>
                                            <li><input type="checkbox" id="checkbox-136"><label
                                                        for="checkbox-136"></label></li>
                                            <li><input type="checkbox" id="checkbox-137"><label
                                                        for="checkbox-137"></label></li>
                                            <li><input type="checkbox" id="checkbox-138"><label
                                                        for="checkbox-138"></label></li>
                                            <li><input type="checkbox" id="checkbox-139"><label
                                                        for="checkbox-139"></label></li>
                                            <li><input type="checkbox" id="checkbox-140"><label
                                                        for="checkbox-140"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-141"><label
                                                        for="checkbox-141"></label></li>
                                            <li><input type="checkbox" id="checkbox-142"><label
                                                        for="checkbox-142"></label></li>
                                            <li><input type="checkbox" id="checkbox-143"><label
                                                        for="checkbox-143"></label></li>
                                            <li><input type="checkbox" id="checkbox-144"><label
                                                        for="checkbox-144"></label></li>
                                            <li><input type="checkbox" id="checkbox-145"><label
                                                        for="checkbox-145"></label></li>
                                            <li><input type="checkbox" id="checkbox-146"><label
                                                        for="checkbox-146"></label></li>
                                            <li><input type="checkbox" id="checkbox-147"><label
                                                        for="checkbox-147"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-148"><label
                                                        for="checkbox-148"></label></li>
                                            <li><input type="checkbox" id="checkbox-149"><label
                                                        for="checkbox-149"></label></li>
                                            <li><input type="checkbox" id="checkbox-150"><label
                                                        for="checkbox-150"></label></li>
                                            <li><input type="checkbox" id="checkbox-151"><label
                                                        for="checkbox-151"></label></li>
                                            <li><input type="checkbox" id="checkbox-152"><label
                                                        for="checkbox-152"></label></li>
                                            <li><input type="checkbox" id="checkbox-153"><label
                                                        for="checkbox-153"></label></li>
                                            <li><input type="checkbox" id="checkbox-154"><label
                                                        for="checkbox-154"></label></li>
                                        </ul>
                                    </li>
                                    {{--<li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-155"><label
                                                        for="checkbox-155"></label></li>
                                            <li><input type="checkbox" id="checkbox-156"><label
                                                        for="checkbox-156"></label></li>
                                            <li><input type="checkbox" id="checkbox-157"><label
                                                        for="checkbox-157"></label></li>
                                            <li><input type="checkbox" id="checkbox-158"><label
                                                        for="checkbox-158"></label></li>
                                            <li><input type="checkbox" id="checkbox-159"><label
                                                        for="checkbox-159"></label></li>
                                            <li><input type="checkbox" id="checkbox-160"><label
                                                        for="checkbox-160"></label></li>
                                            <li><input type="checkbox" id="checkbox-161"><label
                                                        for="checkbox-161"></label></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><input type="checkbox" id="checkbox-162"><label
                                                        for="checkbox-162"></label></li>
                                            <li><input type="checkbox" id="checkbox-163"><label
                                                        for="checkbox-163"></label></li>
                                            <li><input type="checkbox" id="checkbox-164"><label
                                                        for="checkbox-164"></label></li>
                                            <li><input type="checkbox" id="checkbox-165"><label
                                                        for="checkbox-165"></label></li>
                                            <li><input type="checkbox" id="checkbox-166"><label
                                                        for="checkbox-166"></label></li>
                                            <li><input type="checkbox" id="checkbox-167"><label
                                                        for="checkbox-167"></label></li>
                                            <li><input type="checkbox" id="checkbox-168"><label
                                                        for="checkbox-168"></label></li>
                                        </ul>
                                    </li>--}}
                                </ul>
                            </div>
                            <!-- days-field -->
                        </section>
                    </section>
                </fieldset>
                @else
                    {{--<label style=" margin: 0 auto; text-align: center;">Вибаріть приблизний час</label>--}}
                <br>
                    <h2 style="
                    text-align: center; font-family: inherit;
                    font-weight: 500;
                    line-height: 1.1;
                    color: inherit;">Вибаріть приблизний час</h2>
                    <select class="form-control" id="hol_type" name="time_user" style="width: 25%; margin: 0 auto; text-align: center;">
                            <option id="" value="00">00</option>
                            <option id="" value="01">01</option>
                            <option id="" value="">02</option>
                            <option id="" value="02">03</option>
                            <option id="" value="04">04</option>
                            <option id="" value="05">05</option>
                            <option id="" value="06">06</option>
                            <option id="" value="07">07</option>
                            <option id="" value="08">08</option>
                            <option id="" value="09">09</option>
                            <option id="" value="10">10</option>
                            <option id="" value="11">11</option>
                            <option id="" value="12">12</option>
                            <option id="" value="13">13</option>
                            <option id="" value="14">14</option>
                            <option id="" value="15">15</option>
                            <option id="" value="16">16</option>
                            <option id="" value="17">17</option>
                            <option id="" value="18">18</option>
                            <option id="" value="19">19</option>
                            <option id="" value="20">20</option>
                            <option id="" value="21">21</option>
                            <option id="" value="22">22</option>
                    </select>
                @endif

            </section>
            <!--/main-field-->

                <section>
                    @if(!Auth::check())
                        <div style="text-align: center; color: red;"><p>Для того щоб залишити заявку треба <a href="/login">ввійти</a> або <a href="/register">зареєструватись</a></p></div>
                    @endif
                    <section class="contact-form" style="width: 30%; margin: 0 auto">
                        <ul>

                                <div class="error error-name hide"></div>
                                <li><label for="">Ім'я заказчика</label><input value="@if(Auth::check()){{Auth::User()->name}}@endif" class="input-style" name="name" type="text">
                                </li>

                                <div class="error error-phone hide"></div>
                                <li><label for="">Телефон заказчика</label><input class="input-style" value="@if(Auth::check()){{Auth::User()->phone}}@endif" name="phone"
                                                                                   type="text"></li>
                            @if(Auth::check() && Auth::User()->is_admin == 1)
                                <div class="error error-email hide"></div>
                                <li><label for="">Email</label><input class="input-style"
                                                                      value="@if(Auth::check()){{Auth::User()->email}}@endif"
                                                                      name="email" type="email">
                                </li>

                                <div class="error error-description hide"></div>
                                <li><label for="">Побажання</label><textarea class="input-style" name="description"
                                                                             id=""
                                                                             cols="30" rows="10"></textarea></li>
                            @endif
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

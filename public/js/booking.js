arrayTime = [];

$("#order_form").submit(function (event) {
    $('.error').addClass('hide');

    var data = $('#order_form').serializeArray();

    $.each(arrayTime, function (i, elem) {
        data.push({name: 'timeList[' + arrayTime[i] + ']', value: 'on'});
    });

    $.ajax({
        url: '/order/create',  // указываем URL
        type: "post",
        data: data,
        success: function (data, textStatus) {
            if (typeof data !== 'object') {
                $('#order_form')[0].reset();

                //update time table
                update();

                $('.days-field').removeClass('fadeIn').addClass('fadeOut');
                $('.day-nav ul').removeClass('fadeInDown').addClass('fadeOut');
                setTimeout(function () {
                    $('.days-field').removeClass('fadeOut').addClass('fadeIn');
                    $('.day-nav ul').removeClass('fadeOut').addClass('fadeInDown');
                }, 800);

                $('.modal-backdrop').fadeIn(700);
                $('.booking-modal').addClass('active');
                $('.error').addClass('hide');
            } else {
                if (typeof  data.name !== 'undefined') {
                    $('.error-name').removeClass('hide')
                    $('.error-name').html(data.name[0])
                }
                if (typeof  data.phone !== 'undefined') {
                    $('.error-phone').removeClass('hide')
                    $('.error-phone').html(data.phone[0])
                }
                if (typeof  data.email !== 'undefined') {
                    $('.error-email').removeClass('hide')
                    $('.error-email').html(data.email[0])
                }
                if (typeof  data.agree !== 'undefined') {
                    $('.error-agree').removeClass('hide')
                    $('.error-agree').html(data.agree[0])
                }
                if (typeof  data.description !== 'undefined') {
                    $('.error-description').removeClass('hide')
                    $('.error-description').html(data.description[0])
                }
                if (typeof  data.type !== 'undefined') {
                    $('.error-type').removeClass('hide')
                    $('.error-type').html(data.type[0])
                }
                if (typeof  data.room !== 'undefined') {
                    $('.error-room').removeClass('hide')
                    $('.error-room').html(data.room[0])
                }
                if (typeof  data.check !== 'undefined') {
                    $('.error-check').removeClass('hide')
                    $('.error-check').html(data.check[0])
                }
                if (typeof  data.timeList !== 'undefined') {
                    $('.error-timeList').removeClass('hide')
                    $('.error-timeList').html(data.timeList[0])
                }
            }
        }
    });
    event.preventDefault();
});


/*
 cancel the settings of the previous week
 */
function cancelSetting() {
    $('input:checkbox').each(function (i, elem) {
        $(this).next('label').removeClass('without-pay');
        $(this).next('label').removeClass('paid');
        $(this).attr('checked', false);
        document.getElementById($(this).attr('id')).disabled = false;
    });
}

selectType = false;
summa = 0;
count = 0;
photoSelect = false;
typeBook = '';
$('input:radio[name=type]').on('change', function () {

    selectType = true;
    update(room);
    userSelect();

    var a = $(this).attr('id');

    if (a == 'chil'){

        $('li .price').each(function (i, elem) {
            var num = parseInt($(this).html().replace(/\D+/g,""));
            num-=50;
            $(this).html(num+" грн")
        });

        typeBook = 'chil';
        summa-= 200 * count;
        $("#total-sum dd").html(summa + ' грн');
        photoSelect = true;

    } else if(a == 'adu') {


        typeBook = 'adu';
        if(photoSelect == true){
            photoSelect = false;
            summa+= 50 * count;
            $("#total-sum dd").html(summa + ' грн');

            //refresh price
            $('li .price').each(function (i, elem) {
                var num = parseInt($(this).html().replace(/\D+/g,""));
                num+=50;
                $(this).html(num+" грн")
            });
        }

    } else if(a == 'slut'){

        typeBook = 'slut';
        if(photoSelect == true){
            photoSelect = false;
            summa+= 50 * count;
            $("#total-sum dd").html(summa + ' грн');

            //refresh price
            $('li .price').each(function (i, elem) {
                var num = parseInt($(this).html().replace(/\D+/g,""));
                num+=50;
                $(this).html(num+" грн")
            });

        }
    }

    $("#total_summ_input").attr('value', $("#total-sum").text())
});


function recordDataCalendar(data) {

    $('#monday').html(data['days']['0']);
    $('#monday').attr('calendar_day', data['week']['1']);

    $('#tuesday').html(data['days']['1']);
    $('#tuesday').attr('calendar_day', data['week']['2']);

    $('#wednesday').html(data['days']['2']);
    $('#wednesday').attr('calendar_day', data['week']['3']);

    $('#thursday').html(data['days']['3']);
    $('#thursday').attr('calendar_day', data['week']['4']);

    $('#friday').html(data['days']['4']);
    $('#friday').attr('calendar_day', data['week']['5']);

    $('#saturday').html(data['days']['5']);
    $('#saturday').attr('calendar_day', data['week']['6']);

    $('#sunday').html(data['days']['6']);
    $('#sunday').attr('calendar_day', data['week']['7']);

    var nowDay = data['nowDay'];

    $('li').removeClass('active');

    $('span').each(function(){
        if ($(this).attr('calendar_day') == nowDay){
            $(this).parent('li').addClass('active');
        }
    });


    $('.month').html(data['month']);
    $('.year').html(data['year']);
}


function userSelect() {
    $('input:checkbox').each(function (i, elem) {
        var index = arrayTime.indexOf($(this).attr('name'));
        if (index != -1) {
            $(this).prop('checked', true);
        }

    });
}

//change room
room = 'room-1';
$("input[name='room']").click(function (event) {
    $(this).attr('id');
    $("li .selectTime").remove();
    $(".booking-list").empty()

    arrayTime = [];

    //nullable summa
    summa = 0;
    count = 0;
    $("#total-sum dd").html(summa + ' грн');

    room = $(this).attr('id');

    if (selectType == true){
        update($(this).attr('id'));
    }

});


update('room-1');

//Set booked, booked and paid and disabled time
function settingsTime(data) {

    $('input:checkbox').each(function (i, elem) {
        val = data['week'][i + 1];
        if (!$(this).hasClass('check-agree')) {
            $(this).attr('name', '' + data['week'][i + 1] + '');
        }
    });


    val = data['timeBook'];
    for (var i = 0; i < val.length; i++) {
        val[i] = Number(val[i]);
    }


    $('input:checkbox').each(function (i, elem) {

        var index = val.indexOf(Number($(this).attr('name')));
        if (index != -1) {
            $(this).next('label').addClass('without-pay');
            document.getElementById($(this).attr('id')).disabled = true;
        }
    });


    val = data['timeBookPaid'];
    for (var i = 0; i < val.length; i++) {
        val[i] = Number(val[i]);
    }

    $('input:checkbox').each(function (i, elem) {

        var index = val.indexOf(Number($(this).attr('name')));
        if (index != -1) {
            $(this).next('label').addClass('paid');
            document.getElementById($(this).attr('id')).disabled = true;
        }
    });

    val = data['disabledTime'];
    $('input:checkbox').each(function (i, elem) {
        var index = val.indexOf($(this).attr('name'));
        if (index != -1) {
            document.getElementById($(this).attr('id')).disabled = true;
        }
    });

}

function update(idRoom) {
    cancelSetting();
    $.ajax({
        url: '/booking/get-time',  // указываем URL
        type: "get",
        data: {idRoom: idRoom},
        success: function (data, textStatus) {

            recordDataCalendar(data);

            settingsTime(data);

        }

    });
}

function changePanelBooking(){

}

//todo
//change selected room and time
$('input:checkbox').change(function () {

    var c = this.checked;

    if (c && $(this).attr('name') != 'agree') {
        arrayTime.push($(this).attr('name'));
        unixTime = $(this).attr('name');
        $.ajax({
            url: '/booking/get-str-time',  // указываем URL
            type: "get",
            data: {unixTime: unixTime, typeBook: typeBook, hol_type: HolType},
            success: function (data, textStatus) {
                $(".booking-list").append("<li class='selectTime' name='" + unixTime + "'> <ul> <li class=\"date\">" + data['dataStr'] + "</li>  <li class=\"time\">" + data['timeStrStart'] + "  -  " + data['timeStrEnd'] + "</li> <li class=\"price\">" + data['cost'] + " грн</li> </ul> </li>");
                summa+= data['cost'];
                $("#total-sum dd").html(summa + ' грн');
                count++;
            }
        });

    } else {
        if($(this).attr('name') != 'agree'){
            var index = arrayTime.indexOf($(this).attr('name'));
            arrayTime.splice(index, 1);
            unixTime = $(this).attr('name');
            var name = $(this).attr('name');
            $("li[name='"+name+"']").remove();

            $.ajax({
                url: '/booking/get-str-time',  // указываем URL
                type: "get",
                data: {unixTime: unixTime, typeBook: typeBook},
                success: function (data, textStatus) {
                    summa-= data['cost'];
                    $("#total-sum dd").html(summa + ' грн');
                    count--;
                }
            });
        }

    }

});



$('.arrows.right').click(function (event) {
    getNext();
});

$('.arrows.left').click(function (event) {
    getPrevious();
});


function getNext() {

    cancelSetting();

    $.ajax({
        url: '/booking/get-next-time',  // указываем URL
        type: "get",
        success: function (data, textStatus) {

            recordDataCalendar(data);

            settingsTime(data);

            userSelect();
        }


    });
}

function getPrevious() {

    cancelSetting();

    $.ajax({
        url: '/booking/get-prev-time',  // указываем URL
        type: "get",
        success: function (data, textStatus) {

            recordDataCalendar(data);

            settingsTime(data);

            userSelect();
        }

    });
}

$('input:checkbox').each(function (i, elem) {
    document.getElementById($(this).attr('id')).disabled = true;
});
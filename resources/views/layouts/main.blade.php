
<style>
    .hide {
        display: none;
    }

    .error {
        color: #880000;
    }
</style>

<script>
    @if(!Auth::check())
        $('.profile-link').click(function () {
                $('.error').addClass('hide');
                $('.modal-backdrop').fadeIn(700);
                $('.enter-modal').addClass('active');
                $('#login')[0].reset();
                $('#registration')[0].reset();
                $('#recovery')[0].reset();
            });
    @endif
    @if(Auth::check())
         $('.profile-link').click(function () {
                window.location = '/personal-data';
            });
    @endif
</script>

<script>
    $("#login").on('submit', function (e) {
        var data = $("#login").serialize()
        e.preventDefault();
        // link on form
        var form = this;
        $.ajax({
            url: '{{ url('/autorize') }}',
            type: "post",
            data: data,
        }).done(function(data) {
            $('.error').addClass('hide')
            // Ajax perform, submit form
            if (data == 'login'){
                form.submit();
            } else if (data == 'noValid') {
                $('.error-email').removeClass('hide')
                $('.error-email').html('Пользователь не найден.')
            }else {
                if (typeof  data.email !== 'undefined') {
                    $('.error-email').removeClass('hide')
                    $('.error-email').html(data.email[0])
                }
                if (typeof  data.password !== 'undefined') {
                    $('.error-password').removeClass('hide')
                    $('.error-password').html(data.password[0])
                }
            }
        });
    });
</script>

<script>
    $("#register-btn").on('click', function (){
        $('.error').addClass('hide');
    });
</script>


<script>
    $("#registration").submit(function (event) {
        var data = $("#registration").serialize()
        $.ajax({
            url: '{{url('/register')}}',
            type: "post",
            data: data,
            success: function (data, textStatus) {
                if (typeof data !== 'object') {
                    $('#registration')[0].reset();
                    window.location = '{{url('/personal-data')}}'
                } else {
                    $('.error').addClass('hide')
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
                    if (typeof  data.surname !== 'undefined') {
                        $('.error-surname').removeClass('hide')
                        $('.error-surname').html(data.surname[0])
                    }
                    if (typeof  data.password !== 'undefined') {
                        $('.error-pass').removeClass('hide')
                        $('.error-pass').html(data.password[0])
                    }
                }
            }
        });
        event.preventDefault();
    });
</script>

<script>
    $("#recovery").on('submit', function (e) {
        var data = $("#recovery").serialize()
        e.preventDefault();
        // link on form
        var form = this;
        $.ajax({
            url: '{{ url('/recovery') }}',
            type: "post",
            data: data,
        }).done(function(data) {
            $('.error').addClass('hide')
            // Ajax perform, submit form
            if (data['recovery'] == 'recovery'){
                $('.recovery-modal').removeClass('active');
                setTimeout(function () {
                $('.success-modal').addClass('active');
                }, 700);
            } else {
                if (typeof  data.email !== 'undefined') {
                    $('.error-email').removeClass('hide')
                    $('.error-email').html(data.email[0])
                }
            }
        });
    });
</script>


<form>
<li id="ru" {{--class="active"--}}><a href="{{url('/locale/ru')}}">Рус</a></li>
<li id="en"><a href="{{url('/locale/en')}}">Eng</a></li>
</form>

@if(App::getLocale() == 'en')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('#en').addClass('active');
        });
    </script>
@endif

@if(App::getLocale() == 'ru')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('#ru').addClass('active');
        });
    </script>
@endif

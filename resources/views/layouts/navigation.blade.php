<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Організація свят</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Послуги <span class="sr-only">(current)</span></a></li>
                @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
                <li><a href="/employe">Працівники</a></li>
                @endif
                <li><a href="/holidays">Список послуг</a></li>
                <li><a href="/shops">Список доступних закладів</a></li>
                @if(\Illuminate\Support\Facades\Auth::check())
                <li><a href="/personal-data">Особистий кабінет</a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check() && Auth::User()->is_admin == 1)
                    <li><a href="/admin">Адміністративна панель</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout">Вихід</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
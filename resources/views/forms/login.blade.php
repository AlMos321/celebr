<form id="login" role="form" action="{{ url('/login') }}" method="post">
    {!! csrf_field() !!}
    <ul class="input-list">
        <div class="error error-email hide">Введите Email</div>
        <li><input class="input-style" name="email" type="email" placeholder="email"></li>
        <div class="error error-password hide">Введите пароль</div>
        <li><input class="input-style" name="password" type="password" placeholder="Пароль"></li>
    </ul>

    <a class="forgotten-pass" href="#">Забыли пароль?</a>

    <ul class="btns-list">
        <li>
            <button class="btn blue" id="login">Войти</button>
        </li>
        <li>
            <button class="btn white" type="submit" id="register-btn">Регистрация</button>
        </li>
    </ul>
</form>
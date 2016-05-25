<form id="registration" action="{{ url('/register') }}" method="post">
    {!! csrf_field() !!}
    <ul>
        <div class="error error-name hide">Введите имя</div>
        <li><input name="name" class="input-style" type="text" placeholder="Имя"></li>
        <div class="error error-surname hide">Введите фамилию</div>
        <li><input name="surname" class="input-style" type="text" placeholder="Фамилия"></li>
        <div class="error error-email hide">Введите емейл</div>
        <li><input name="email" class="input-style" type="email" placeholder="email"></li>
        <div class="error error-phone hide">Введите телефон</div>
        <li><input name="phone" class="input-style" type="tel" placeholder="Телефон"></li>
        <div class="error error-pass hide">Введите пароль</div>
        <li><input name="password" class="input-style" type="password" placeholder="Пароль"></li>
        <div class="error error-re-pass hide">Пароли должны совпадать</div>
        <li><input name="password_confirmation" class="input-style" type="password" placeholder="Повторить пароль"></li>
    </ul>
    <footer>
        <button class="btn blue" type="submit">Зарегистрироваться</button>
    </footer>
</form>
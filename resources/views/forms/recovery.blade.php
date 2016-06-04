<div class="modal recovery-modal">
    <header>
        <h4>Востановление пароля</h4>
        <a href="#" class="cls-btn">&times;</a>
    </header>

    <section>
        <form id="recovery" action="{{url("/recovery")}}" method="post">
            {!! csrf_field() !!}
            <ul>
                <div class="error error-email hide">Введите Email</div>
                <li><input class="input-style" type="email" name="email" placeholder="Введите ваш email"></li>
            </ul>
            <footer>
                <button class="btn blue" type="submit">Отправить</button>
            </footer>
        </form>
    </section>

</div><!-- /register-modal -->

<div class="modal success-modal">
    <header>
        <h4>Пароль бЫл успешно выслан на Ваш email.</h4>
        <a href="#" class="cls-btn">&times;</a>
    </header>
</div><!-- /register-modal -->
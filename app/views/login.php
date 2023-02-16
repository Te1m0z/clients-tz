<?= view( 'layout/head', array( 'title' => 'Войти' ) ) ?>

<body>
    <?= view( 'layout/header' ) ?>

    <div class="container">
        <h1>Войти в свой аккаунт</h1>
        <div class="msg"></div>
        <form action="/login" method="POST" id="login-form">
            <div class="group">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="input" />
            </div>
            <div class="group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="input" />
            </div>
            <button type="submit" class="form-btn">Войти</button>
        </form>
    </div>

    <?= view( 'layout/footer' ) ?>
</body>

</html>

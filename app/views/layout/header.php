<header>
    <div class="container">
        <nav>
            <a href="/">Главная</a>
            <?php if ( request()->user() ) : ?>
                <a href="/admin">Админ</a>
            <?php else : ?>
                <a href="/login">Войти</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<div class="left-bar">

</div>
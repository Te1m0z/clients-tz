<?= view( 'layout/head', array( 'title' => 'Главная' ) ) ?>

<body>
    <?= view( 'layout/header' ) ?>

    <div class="container">
        <h1>Записи</h1>

        <div class="list">

            <?php foreach ($records as $record) : ?>
                <?= view( 'parts/record', array( 'record' => $record ) ) ?>
            <?php endforeach; ?>

        </div>
    </div>


    <?= view( 'layout/footer' ) ?>

</body>

</html>

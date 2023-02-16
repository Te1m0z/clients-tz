<?= view( 'layout/head', array( 'title' => 'Главная' ) ) ?>

<body>
<?= view( 'layout/header' ) ?>

<div class="container">
    <h1>Админ панель</h1>

    <form id="logout-form">
        <button type="submit" class="form-btn">Выйти</button>
    </form>

    <div class="add" onclick="window.openAddModal(event)">Добавить</div>

    <div class="list">

        <?php foreach ($records as $record) : ?>
            <?= view( 'parts/record', array( 'record' => $record ) ) ?>
        <?php endforeach; ?>

    </div>
</div>


<?= view( 'layout/footer' ) ?>

</body>

</html>

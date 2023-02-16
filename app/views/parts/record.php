<div class="record" data-id="<?= $record['id']; ?>">

    <?php $has_childs = isset($record['children']); ?>

    <div class="header-content">
        <div class="title">
            <?= $record['title']; ?>
        </div>
        
        <div class="description" style="display: none;">
            <?= $record['description']; ?>
        </div>

        <div class="right-header">

            <?php if ( request()->user() && router()->request->uri === '/admin' ) : ?>
                <div class="add" onclick="window.openAddModal(event)">Добавить</div>
                <div class="edit" onclick="window.openEditModal(event)">Изменить</div>
                <div class="delete" onclick="window.deleteRecord(event)">Удалить</div>
            <?php endif; ?>

            <?php if ($has_childs) : ?>
                <div class="more">+</div>
            <?php endif; ?>

        </div>

    </div>

    <?php if ( $has_childs ) : ?>
        <div class="children">
            <?php foreach ($record['children'] as $child) : ?>
                <?= view( 'parts/record', array( 'record' => $child ) ) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>
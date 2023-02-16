<div class="overlay add-overlay" style="display: none;">
    <div class="modal">
        <div class="close" onclick="window.closeModal('add-overlay')">Закрыть</div>
        <form id="add-form">
            <input type="hidden" name="parent_id" />
            <div class="msg"></div>
            <div class="group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="input" />
            </div>
            <div class="group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="input"></textarea>
            </div>
            <button type="submit" class="form-btn">Добавить</button>
        </form>
    </div>
</div>


<div class="overlay edit-overlay" style="display: none;">
    <div class="modal">
        <div class="close" onclick="window.closeModal('edit-overlay')">Закрыть</div>
        <form id="edit-form">
            <input type="hidden" name="id" />
            <div class="msg"></div>
            <div class="group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="input" />
            </div>
            <div class="group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="input"></textarea>
            </div>
            <button type="submit" class="form-btn">Обновить</button>
        </form>
    </div>
</div>

<script src="/js/script.js"></script>
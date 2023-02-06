<!-- MODAL -->
<div class="modal">
    <div class="modal__card">
        <span class="modal__question">Are you sure you want to delete this editor?</span>
        <span class="modal__post-editor">Izzy Cantella</span>
        <a class="modal__delete btn btn--black" href="/admin/deleteeditor?id=1">DELETE</a>
        <a class="modal__cancel" href="/admin/vieweditors">CANCEL</a>
    </div>
</div>

<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="vieweditors">
    <!-- VIEW EDITORS HEADER -->
    <h1 class="vieweditors-header">EDITORS</h1>

    <!-- EDITORS GRID -->
    <div class="editor-grid">
        <?php for ($i = 0; $i < 6; $i++) { ?>
            <div class="editor-card">
                <div class="editor-card__info">
                    <span class="editor-card__name">Izzy Cantella</span>
                    <span class="editor-card__email">izzycantella@techbubl.com</span>
                </div>
                <div class="editor-card__actions">
                    <a class="btn btn--white" href="/admin/editeditor?id=1">EDIT INFO</a>
                    <button class="delete-btn btn btn--black" data-id="1">DELETE POST</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php if (isset($_GET["id"])) { ?>
    <div class="modal">
        <div class="modal__card">
            <span class="modal__question">Are you sure you want to delete this editor?</span>
            <span class="modal__post-editor"><?php echo $data["editor"]["first_name"] . " " . $data["editor"]["last_name"]; ?></span>
            <form action="/admin/deleteeditor?id=<?php echo $data["editor"]["id"]; ?>" method="POST">
                <button class="modal__delete btn btn--black" type="submit">DELETE</button>
            </form>
            <a class="modal__cancel" href="/admin/vieweditors">CANCEL</a>
        </div>
    </div>
<?php } ?>

<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="vieweditors">
    <!-- VIEW EDITORS HEADER -->
    <h1 class="vieweditors-header">EDITORS</h1>

    <?php if (count($data["editors"]) == 0) : ?>
        <span style="font-size: 1.25rem; margin: 1rem; text-align: center;">There are no editors!</span>
    <?php endif ?>

    <?php if (count($data["editors"]) > 0) : ?>
        <div class="editor-grid">
            <?php foreach ($data["editors"] as $editor) : ?>
                <?php
                switch ($editor["is_verified"]) {
                    case 1:
                        $editor["is_verified"] = "Verified";
                        break;

                    case 0:
                        $editor["is_verified"] = "Not Verified";
                        break;
                }
                ?>
                <div class="editor-card">
                    <div class="editor-card__info">
                        <span class="editor-card__name"><?php echo $editor["first_name"] . " " . $editor["last_name"]; ?></span>
                        <span class="editor-card__email"><?php echo $editor["email"]; ?></span>
                        <span class="editor-card__role" data-value="<?php echo $editor["is_verified"]; ?>"><?php echo $editor["is_verified"]; ?></span>
                    </div>
                    <div class="editor-card__actions">
                        <a class="btn btn--white" href="/admin/editeditor?id=<?php echo $editor["id"]; ?>">EDIT INFO</a>
                        <a class="delete-btn btn btn--black" href="/admin/deleteeditor?id=<?php echo $editor["id"]; ?>">DELETE EDITOR</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>
<?php if (isset($_GET["id"])) { ?>
    <div class="modal">
        <div class="modal__card">
            <span class="modal__question">Are you sure you want to delete this category?</span>
            <span class="modal__post-editor"><?php echo $data["category"]["name"]; ?></span>
            <form action="/admin/deletecategory?id=<?php echo $data["category"]["id"]; ?>" method="POST">
                <button class="modal__delete btn btn--black" type="submit">DELETE</button>
            </form>
            <a class="modal__cancel" href="/admin/viewcategories">CANCEL</a>
        </div>
    </div>
<?php } ?>

<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="viewcategories">
    <!-- VIEW EDITORS HEADER -->
    <h1 class="viewcategories-header">CATEGORIES</h1>

    <?php if (count($data["categories"]) == 0) : ?>
        <span style="font-size: 1.25rem; margin: 1rem; text-align: center;">There are no categories!</span>
    <?php endif ?>

    <?php if (count($data["categories"]) > 0) : ?>
        <div class="category-grid">
            <?php foreach ($data["categories"] as $category) : ?>
                <div class="category-card">
                    <div class="category-card__info">
                        <span class="category-card__name"><?php echo $category["name"]; ?></span>
                    </div>
                    <div class="category-card__actions">
                        <a class="btn btn--white" href="/admin/editcategory?id=<?php echo $category["id"]; ?>">EDIT CATEGORY</a>
                        <a class="delete-btn btn btn--black" href="/admin/deletecategory?id=<?php echo $category["id"]; ?>">DELETE CATEGORY</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>
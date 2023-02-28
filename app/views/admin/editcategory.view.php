<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="editcategory">
    <!-- EDIT CATEGORY HEADER -->
    <h1 class="editcategory-header">EDIT CATEGORY</h1>

    <!-- EDIT CATEGORY FORM -->
    <form class="editcategory-form" action="/admin/editcategory?id=<?php echo $data["category"]["id"]; ?>" method="POST">
        <div class="editcategory-form__input-field">
            <label for="editcategory-name">Category Name</label>
            <input name="editcategory-name" type="text" placeholder="Category Name" value="<?php echo $data["category"]["name"]; ?>">
        </div>
        <button type="submit" class="btn btn--black editcategory__submit-btn">UPDATE</button>
    </form>
    <a class="go-back" href="/admin/viewcategories">GO BACK</a>

    <?php if (isset($data["err"])) { ?>
        <p class="err"> <?php echo $data["err"]; ?> </p>
    <?php } ?>

    <?php if (isset($data["success"])) { ?>
        <p class="success"> <?php echo $data["success"]; ?> </p>
    <?php } ?>
</div>
<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="createcategory">
    <!-- CREATE CATEGORY HEADER -->
    <h1 class="createcategory-header">CREATE CATEGORY</h1>

    <!-- CREATE CATEGORY FORM -->
    <form class="createcategory-form" action="/admin/createcategory" method="POST">
        <div class="createcategory-form__input-field">
            <label for="category-name">Category Name</label>
            <input name="category-name" type="text" placeholder="Category Name">
        </div>
        <button type="submit" class="btn btn--black createcategory__submit-btn">CREATE</button>
    </form>

    <?php if (isset($data["err"])) { ?>
        <p class="err"> <?php echo $data["err"]; ?> </p>
    <?php } ?>

    <?php if (isset($data["success"])) { ?>
        <p class="success"> <?php echo $data["success"]; ?> </p>
    <?php } ?>
</div>
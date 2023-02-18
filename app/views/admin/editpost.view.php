<!-- HOME -->
<div class="icon-wrapper">
  <a href="/admin" class="home-icon">
    <i class="fa fa-house"></i>
  </a>
</div>

<div class="editpost">
  <!-- EDIT POST HEADER -->
  <h1 class="editpost__header">EDIT POST</h1>

  <!-- EDIT POST FORM -->
  <form class="editpost__form" action="/admin/editpost?id=<?php echo $_GET["id"]; ?>" method="POST">
    <div class="editpost__input-field">
      <label for="title">Title</label>
      <input class="createpost__title" name="title" type="text" value="<?php echo $data["post"]["title"]; ?>">
    </div>
    <div class="editpost__input-field">
      <textarea name="body" class="content-area"><?php echo $data["post"]["body"]; ?></textarea>
    </div>
    <div class="editpost__categories">
      <h2>Add Category</h2>
      <?php foreach ($data["categories"] as $category) { ?>
          <div class="createpost__radio">
            <input type="radio" name="category" value="<?php echo $category["id"]; ?>" <?php if ($data["post"]["category_id"] === $category["id"]) { echo "checked"; }?> />
            <label for="category"><?php echo $category["name"]; ?></label>
          </div>
      <?php } ?>
    </div>
    <button type="submit" class="btn btn--black editpost__submit-btn">
      UPDATE
    </button>
  </form>

  <?php if (!empty($data["publish_err"])) { ?>
    <p class="publish-err"><?php echo $data["publish_err"]; ?></p>
  <?php } ?>
</div>
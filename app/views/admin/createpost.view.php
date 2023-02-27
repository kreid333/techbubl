<!-- HOME -->
<div class="icon-wrapper">
  <a href="/admin" class="home-icon">
    <i class="fa fa-house"></i>
  </a>
</div>

<div class="createpost">
  <!-- CREATE POST HEADER -->
  <h1 class="createpost__header">CREATE POST</h1>

  <!-- CREATE POST FORM -->
  <form class="createpost__form" action="/admin/createpost" method="POST">
    <div class="createpost__input-field">
      <label for="title">Title</label>
      <input class="createpost__title" name="title" type="text" placeholder="Title">
    </div>
    <div class="createpost__input-field">
      <textarea name="body" class="content-area"></textarea>
    </div>
    <div class="createpost__categories">
      <h2>Add Category</h2>
      <?php foreach ($data["categories"] as $category) {?>
      <div class="createpost__radio">
        <input type="radio" name="category" value="<?php echo $category["id"]; ?>" />
        <label for="category"><?php echo $category["name"]; ?></label>
      </div>
      <?php } ?>
    </div>
    <button type="submit" class="btn btn--black createpost__submit-btn">
      SUBMIT
    </button>
  </form>

  <?php if (isset($data["err"])) { ?>
    <p class="publish-err"><?php echo $data["err"]; ?></p>
  <?php } ?>
</div>
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
      <input name="title" type="text" placeholder="Title">
    </div>
    <div class="createpost__input-field">
      <textarea name="body" class="content-area"></textarea>
    </div>
    <button type="submit" class="btn btn--black createpost__submit-btn">
      SUBMIT
    </button>
  </form>

  <?php if (!empty($data["publish_err"])) { ?>
    <p class="publish-err"><?php echo $data["publish_err"]; ?></p>
  <?php } ?>
</div>
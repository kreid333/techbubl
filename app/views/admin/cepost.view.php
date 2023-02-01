<!-- HOME -->
<a href="/admin" class="home-icon">
    <i class="fa fa-house"></i>
</a>

<div class="ce-post">
  <!-- NEW POST HEADER -->
  <?php if ($_SERVER["REQUEST_URI"] === "/admin/createnewpost" || $_SERVER["REQUEST_URI"] === "/admin/createnewpost/") { ?>
    <h1 class="ce-post__header">CREATE NEW POST</h1>
  <?php } ?>

  <?php if (strpos($_SERVER["REQUEST_URI"], "editpost")) { ?>
    <h1 class="ce-post__header">EDIT POST</h1>
  <?php } ?>

  <!-- NEW POST FORM -->
  <form class="ce-post__form" method="">
    <div class="ce-post__input-field">
      <label for="title">Title</label>
      <input name="title" type="text" placeholder="Title">
    </div>
    <div class="ce-post__input-field">
      <textarea name="content" class="content-area"></textarea>
    </div>
    <button type="submit" class="btn btn--black ce-post__submit-btn">
      <?php if ($_SERVER["REQUEST_URI"] === "/admin/createnewpost" || $_SERVER["REQUEST_URI"] === "/admin/createnewpost/") { ?>
        SUBMIT
      <?php } ?>

      <?php if (strpos($_SERVER["REQUEST_URI"], "editpost")) { ?>
        UPDATE
      <?php } ?>
    </button>
  </form>
</div>
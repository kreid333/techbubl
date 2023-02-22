<?php if (isset($_GET["id"])) { ?>
    <div class="modal">
        <div class="modal__card">
            <span class="modal__question">Are you sure you want to delete this post?</span>
            <span class="modal__post-title"><?php echo $data["post"]["title"]; ?></span>
            <span class="modal__post-author">By <?php echo $data["post"]["first_name"] . " " . $data["post"]["last_name"]; ?></span>
            <span class="modal__post-date">Posted on <?php echo $data["post"]["date_formatted"]; ?></span>
            <form action="/admin/deletepost?id=<?php echo $_GET["id"]; ?>" method="POST">
                <button class="modal__delete btn btn--black" type="submit">DELETE</button>
            </form>
            <a class="modal__cancel" href="/admin">CANCEL</a>
        </div>
    </div>
<?php } ?>

<!-- SETTINGS -->
<div class="icon-wrapper">
    <a href="/admin/settings" class="settings-icon">
        <i class="fa fa-cog"></i>
    </a>
    <?php if (!empty($_POST["search"])) { ?>
        <a href="/admin" class="home-icon">
            <i class="fa fa-house"></i>
        </a>
    <?php } ?>
</div>

<!-- AUTHOR -->
<div class="author">
    <h1 class="author__name"><?php echo $data["user"]["first_name"] . " " . $data["user"]["last_name"]; ?></h1>
    <h2 class="author__role"><?php echo $data["user"]["role"]; ?></h2>
</div>

<!-- SEARCH BAR -->
<form class="admin-search search-bar" action="/admin" method="POST">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" name="search" placeholder="Search">
</form>

<!-- SORTING -->
<div class="admin-sorting sorting">
    <select name="sortby">
        <option value="date">SORT BY: Date</option>
        <option value="author">SORT BY: Author</option>
    </select>
</div>


<!-- ADMIN ACTIONS -->
<div class="admin-actions">
    <a class="btn btn--white" href="/admin/createpost">CREATE POST</a>
    <?php if ($data["user"]["role"] == "Admin") { ?>
        <a class="btn btn--white" href="/admin/createeditor">CREATE EDITOR</a>
        <a class="btn btn--white" href="/admin/createcategory">CREATE CATEGORY</a>
        <a class="btn btn--white" href="/admin/vieweditors">VIEW EDITORS</a>
    <?php } ?>
</div>

<?php if (!empty($_POST)) { ?>
    <h2 class="search">Search Results for "<?php echo $_POST["search"]; ?>"</h2>
<?php } ?>
<!-- ADMIN GRID -->
<div class="admin-grid">
    <?php foreach ($data["posts"] as $post) { ?>
        <div class="admin-post">
            <div class="admin-post__info">
                <span class="admin-post__title"><?php echo $post["title"]; ?></span>
                <span class="admin-post__author"><?php echo $post["first_name"] . " " . $post["last_name"]; ?></span>
                <span class="admin-post__date"><?php echo $post["date_formatted"]; ?></span>
            </div>
            <div class="admin-post__actions">
                <a class="btn btn--white" href="/admin/editpost?id=<?php echo $post["id"]; ?>">EDIT POST</a>
                <a class="delete-btn btn btn--black" href="/admin/deletepost?id=<?php echo $post["id"]; ?>">DELETE POST</a>
            </div>
        </div>
    <?php } ?>
</div>
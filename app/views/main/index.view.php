<!-- POSTS NAV -->
<div class="posts-nav">
    <div class="posts-nav__categories">
        <?php if ($_SERVER["REQUEST_URI"] != "/crypto") { ?>
            <a class="posts-nav__btn" href="/crypto">Crypto</a>
        <?php } ?>
        <?php if ($_SERVER["REQUEST_URI"] != "/webdev") { ?>
            <a class="posts-nav__btn" href="/webdev">Web Dev</a>
        <?php } ?>
        <?php if ($_SERVER["REQUEST_URI"] != "/ai") { ?>
            <a class="posts-nav__btn" href="/ai">AI</a>
        <?php } ?>
        <?php if ($_SERVER["REQUEST_URI"] != "/") { ?>
            <a class="posts-nav__btn" href="/">View All</a>
        <?php } ?>
    </div>
</div>

<?php if ($_SERVER["REQUEST_URI"] != "/") { ?>
    <h1 class="category-title"><?php echo $data["category_title"]; ?></h1>
<?php } ?>

<!-- POSTS GRID -->
<div class="posts-grid">
    <?php foreach ($data["posts"] as $post) { ?>
        <a href="/post?id=<?php echo $post["id"]; ?>">
            <div class="post">
                <div class="post__author">
                    <img class="post__author-img" src="public/assets/images/NoUser.svg" alt="Placeholder">
                    <span class="post__author-name"><?php echo $post["first_name"] . " " . $post["last_name"]; ?></span>
                </div>
                <span class="post__date"><?php echo $post["date_formatted"]; ?></span>
                <h4 class="post__title"><?php echo $post["title"]; ?></h4>
                <span class="post__category"><?php echo $post["name"]; ?></span>
            </div>
        </a>
    <?php } ?>
</div>
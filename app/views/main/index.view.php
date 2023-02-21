<!-- POSTS NAV -->
<div class="posts-nav">
    <div class="posts-nav__categories">
        <a class="posts-nav__btn" href="#">
            Crypto
        </a>
        <a class="posts-nav__btn" href="#">
            Web Dev
        </a>
        <a class="posts-nav__btn" href="#">
            AI
        </a>
    </div>
    <form class="post-sorting sorting" action="" method="GET">
        <select name="sortby">
            <option value="most-recent" 
            <?php if (isset($_GET["sortby"]) && $_GET["sortby"] == "most-recent" || $_SERVER["REQUEST_URI"] == "/") { echo "selected"; }; ?>
            >SORT BY: Most Recent</option>
            <option value="most-popular" 
            <?php if (isset($_GET["sortby"]) && $_GET["sortby"] == "most-popular") { echo "selected"; }; ?>
            >SORT BY: Most Popular</option>
        </select>
        <button class="btn btn--white post-sorting__btn" type="submit">GO</button>
</form>
</div>

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
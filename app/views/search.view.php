<div class="search-page">

    <div class="icon-wrapper">
        <a href="/" class="home-icon">
            <i class="fa fa-house"></i>
        </a>
    </div>

    <h1 class="search-header">Search Results for "<?php echo $_GET["term"]; ?>"</h1>

    <div class="search-results">
        <?php if (!empty($data["posts"])) { ?>
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
        <?php } else { ?>
            <span class="search-err err"><?php echo $data["err"]; ?></span>
        <?php } ?>
    </div>
</div>
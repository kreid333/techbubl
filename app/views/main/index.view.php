<?php if ($data["num_of_results"] == 0) : ?>
    <?php if ($_SERVER["REQUEST_URI"] == "/") : ?>
        <p>No posts have been created. To create a post, login to an admin account using the link below.</p>
        <br />
        <a class="btn btn--black" href="/admin/login">Login</a>
    <?php endif ?>

    <?php $arr = ["crypto" => "Cryptocurrency", "webdev" => "Web Development", "ai" => "Artificial Intelligence"]; ?>

    <?php for ($i = 0; $i < count($arr); $i++) : ?>
        <?php if (strpos($_SERVER["REQUEST_URI"], array_keys($arr)[$i]) != false) : ?>
            <p>There are currently no posts in the <?php echo $arr[array_keys($arr)[$i]]; ?> category.</p>
            <br />
            <a class="btn btn--black" href="/">GO HOME</a>
            <?php break; ?>
        <?php endif ?>
    <?php endfor ?>
<?php endif ?>

<?php if ($data["num_of_results"] > 0) : ?>
    <div class="posts-nav">
        <div class="posts-nav__categories">
            <?php if (strpos($_SERVER["REQUEST_URI"], "/crypto") === false) { ?>
                <a class="posts-nav__btn" href="/crypto">Crypto</a>
            <?php } ?>
            <?php if (strpos($_SERVER["REQUEST_URI"], "/webdev") === false) { ?>
                <a class="posts-nav__btn" href="/webdev">Web Dev</a>
            <?php } ?>
            <?php if (strpos($_SERVER["REQUEST_URI"], "/ai") === false) { ?>
                <a class="posts-nav__btn" href="/ai">AI</a>
            <?php } ?>
            <?php if ($_SERVER["REQUEST_URI"] !== "/" && strpos($_SERVER["REQUEST_URI"], "/?page=") === false) { ?>
                <a class="posts-nav__btn" href="/">View All</a>
            <?php } ?>
        </div>
    </div>

    <?php if (isset($data["category_title"])) : ?>
        <h1 class="category-title"><?php echo $data["category_title"]; ?></h1>
    <?php endif ?>

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
<?php endif ?>

<?php if ($data["num_of_results"] > 12) : ?>
    <div class="pagination">
        <?php
        $initial_link = 1;
        $last_link = 3;

        // checking for remainder when the current page number is divided by 3
        switch (($data["page_num"] % 3)) {
            case 0:
                $last_link = $data["page_num"];
                $initial_link = $last_link - 2;
                break;
            case 1:
                $last_link = $data["page_num"] + 2;
                $initial_link = $data["page_num"];
                break;
            case 2:
                $last_link = $data["page_num"] + 1;
                $initial_link = $data["page_num"] - 1;
                break;
        }

        // if the link that is suppose to be displayed in the middle is the total number of pages...
        if (($last_link - 1) == $data["num_of_pages"]) {
            $last_link = $last_link - 1;
        }

        ?>

        <?php if ($data["page_num"] > 1) : ?>
            <a class="pagination__link" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . ($data["page_num"] - 1) ?>">PREV</a>
        <?php endif ?>


        <?php if ($initial_link != $data["num_of_pages"]) : ?>
            <?php for ($page = $initial_link; $page <= $last_link; $page++) { ?>

                <?php if ($page == $data["page_num"]) { ?>
                    <span class="pagination__link pagination__link--active"><?php echo $page ?></span>
                <?php } else { ?>
                    <a class="pagination__link" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . $page ?>"><?php echo $page ?></a>
                <?php } ?>

            <?php } ?>
        <?php endif ?>

        <?php if ($initial_link == $data["num_of_pages"] && $initial_link != 1) : ?>
            <a class="pagination__link pagination__link--active" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . $initial_link ?>"><?php echo $initial_link ?></a>
        <?php endif ?>

        <?php if ($data["page_num"] < $data["num_of_pages"]) : ?>
            <a class="pagination__link" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . ($data["page_num"] + 1) ?>">NEXT</a>
        <?php endif ?>
    </div>
<?php endif ?>
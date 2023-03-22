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

<div class="icon-wrapper">
    <a href="/admin/settings" class="settings-icon">
        <i class="fa fa-cog"></i>
    </a>
    <?php if (!empty($_POST["search"]) && !isset($data["err"])) { ?>
        <a href="/admin" class="home-icon">
            <i class="fa fa-house"></i>
        </a>
    <?php } ?>
</div>

<div class="author">
    <h1 class="author__name"><?php echo $data["user"]["first_name"] . " " . $data["user"]["last_name"]; ?></h1>
    <h2 class="author__role"><?php echo $data["user"]["role"]; ?></h2>
</div>

<form class="admin-search search-bar" action="/admin" method="POST">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" name="search" placeholder="Search">
</form>

<?php if (isset($data["err"])) { ?>
    <p class="err"><?php echo $data["err"]; ?></p>
<?php } ?>

<div class="admin-actions">
    <a class="btn btn--white" href="/admin/createpost">CREATE POST</a>
    <?php if ($data["user"]["role"] == "Admin") { ?>
        <a class="btn btn--white" href="/admin/createeditor">CREATE EDITOR</a>
        <a class="btn btn--white" href="/admin/createcategory">CREATE CATEGORY</a>
        <a class="btn btn--white" href="/admin/vieweditors">VIEW EDITORS</a>
        <a class="btn btn--white" href="/admin/viewcategories">VIEW CATEGORIES</a>
    <?php } ?>
</div>

<?php if ($data["num_of_results"] == 0) : ?>
    <h2 class="createapost-mess">CREATE A POST!</h2>
<?php endif ?>

<?php if (!empty($_POST["search"]) && !isset($data["err"])) { ?>
    <h2 class="search">Search Results for "<?php echo trim($_POST["search"]); ?>"</h2>
<?php } ?>

<?php if ($data["num_of_results"] > 0) : ?>
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
<?php endif ?>

<?php if (!isset($_POST["search"]) || empty(trim($_POST["search"]))) { ?>
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

            // if the link that is suppose to ne displayed in the middle is the total number of pages...
            if (($last_link - 1) == $data["num_of_pages"]) {
                $last_link = $last_link - 1;
            }

            ?>

            <?php if ($data["page_num"] > 1) { ?>
                <a class="pagination__link" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . ($data["page_num"] - 1) ?>">PREV</a>
            <?php } ?>


            <?php if ($initial_link != $data["num_of_pages"]) { ?>
                <?php for ($page = $initial_link; $page <= $last_link; $page++) { ?>

                    <?php if ($page == $data["page_num"]) { ?>
                        <span class="pagination__link pagination__link--active"><?php echo $page ?></span>
                    <?php } else { ?>
                        <a class="pagination__link" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . $page ?>"><?php echo $page ?></a>
                    <?php } ?>

                <?php } ?>
            <?php } ?>

            <?php if ($initial_link == $data["num_of_pages"] && $initial_link != 1) { ?>
                <a class="pagination__link pagination__link--active" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . $initial_link ?>"><?php echo $initial_link ?></a>
            <?php } ?>

            <?php if ($data["page_num"] < $data["num_of_pages"]) { ?>
                <a class="pagination__link" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "?page=" . ($data["page_num"] + 1) ?>">NEXT</a>
            <?php } ?>
        </div>
    <?php endif ?>
<?php } ?>
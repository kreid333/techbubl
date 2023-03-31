<?php require(dirname(__FILE__, 2) . "/controllers/layout.controller.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Questrial&family=IBM+Plex+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <link rel="icon" type="image/x-icon" href="/public/assets/images/TechBubl.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="/public/assets/js/scripts.js" defer></script>
    <script src="/vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.content-area',
            height: '475px',
            plugins: 'emoticons image link lists',
            menubar: 'file edit view insert',
            toolbar: 'undo redo h2 h3 h4 bold italic numlist bullist emoticons link image',
            link_default_target: '_blank'
        });
    </script>
    <title>TechBubl</title>
</head>

<body>
    <!-- NAV -->
    <nav class="nav">
        <div class="nav__logo">
            <a href="/">
                <img src="/public/assets/images/TechBubl.svg" alt="TechBubl Logo">
                <span>TechBubl</span>
            </a>
        </div>

        <form class="nav-search search-bar" action="/search" method="GET">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="term" placeholder="Search">
        </form>

        <div class="nav__nav-links">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </div>

        <div class="nav__social-links">
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        </div>

        <!-- mobile nav -->
        <button class="nav__search-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <div class="nav__hamburger">
            <div></div>
        </div>
    </nav>

    <!-- MOBLE MENU -->
    <div class="mobile-menu">
        <div class="mobile-menu__nav-links">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </div>

        <div class="mobile-menu__social-links">
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>

    <!-- MOBILE SEARCH MODAL -->
    <div class="search-modal">
        <div class="search-modal__card">
            <span class="search-modal__close">x</span>
            <span class="search-modal__title">Search</span>
            <form class="nav-search search-bar" action="/search" method="GET">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="term" placeholder="Search">
            </form>
        </div>
    </div>

    <!-- WRAPPER -->
    <div class="wrapper">
        <div class="main">
            <?php require($name . ".view.php") ?>
        </div>

        <hr class="divider">

        <div class="aside">
            <div class="logo">
                <img src="/public/assets/images/TechBubl.svg" alt="TechBubl Logo">
                <span>TechBubl</span>
            </div>
            <div class="aside__popular-articles">
                <h3>Popular Articles</h3>
                <?php if (count($data["popular_posts"]) == 0) : ?>
                    <p>No posts have been created.</p>
                <?php endif ?>

                <?php if (count($data["popular_posts"]) > 0) : ?>
                    <?php foreach ($data["popular_posts"] as $post) : ?>
                        <a href="/post?id=<?php echo $post["id"]; ?>">
                            <div class="aside__article"><?php echo $post["title"]; ?></div>
                        </a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="aside__most-recent">
                <h3>Most Recent</h3>
                <?php if (count($data["recent_posts"]) == 0) : ?>
                    <p>No posts have been created.</p>
                <?php endif ?>

                <?php if (count($data["recent_posts"]) > 0) : ?>
                    <?php foreach ($data["recent_posts"] as $post) : ?>
                        <a href="/post?id=<?php echo $post["id"]; ?>">
                            <div class="aside__article"><?php echo $post["title"]; ?></div>
                        </a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="aside__newsletter">
                <h3>Sign up for Daily Bubls</h3>
                <span>A newsletter that offers bite-sized articles discussing various fields in the area of technology.</span>
                <form method="POST">
                    <input type="email" name="newsletter-email" placeholder="Email Address">
                    <button class="btn btn--black">Sign Up</button>
                </form>
                <?php if (isset($data["newsletter_err"])) { ?>
                    <span><?php echo $data["newsletter_err"]; ?></span>
                <?php } ?>
                <?php if (isset($data["newsletter_success"])) { ?>
                    <span><?php echo $data["newsletter_success"]; ?></span>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <span class="footer-text">©2023, TechBubl</span>
    </footer>
</body>

</html>
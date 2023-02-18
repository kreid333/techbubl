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

        <div class="nav-search search-bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="post-search" placeholder="Search">
        </div>

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
        <a class="nav__search-btn" href="/search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>

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
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <a href="#">
                        <div class="aside__article">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>
                    </a>
                <?php } ?>
            </div>
            <div class="aside__most-recent">
                <h3>Most Recent</h3>
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <a href="#">
                        <div class="aside__article">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>
                    </a>
                <?php } ?>
            </div>
            <div class="aside__newsletter">
                <h3>Sign up for Daily Bubls</h3>
                <span>A newsletter that offers bite-sized articles discussing various fields in the area of technology.</span>
                <form action="">
                    <input type="email" name="signup-email" placeholder="Email Address">
                    <button class="btn btn--black">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <span class="footer-text">©2023, TechBubl</span>
    </footer>
</body>

</html>
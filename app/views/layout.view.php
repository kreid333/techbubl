<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;700&family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="public/assets/js/scripts.js" defer></script>
    <title>TechBubl</title>
</head>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">
        <a href="/">
            <img src="public/assets/images/TechBubl.svg" alt="TechBubl Logo">
            <span>TechBubl</span>
        </a>
    </div>

    <div class="search-bar">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" name="" id="">
    </div>

    <div class="nav-links">
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </div>

    <div class="social-links">
        <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
    </div>
    <a href="/search" class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
    </a>
    <button class="hamburger">
        <div class="bar"></div>
    </button>
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

<body>
    <div class="wrapper">
        <div class="main-section">
            <?php require("$area/$name.view.php") ?>
        </div>
        <hr class="divider">
        <div class="aside-section">
            <div class="logo">
                <a href="/">
                    <img src="public/assets/images/TechBubl.svg" alt="TechBubl Logo">
                    <span>TechBubl</span>
                </a>
            </div>
            <div class="popular-articles">
                <h3>Popular Articles</h3>
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <a href="#">
                    <div class="aside-article">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>
                    </a>
                <?php } ?>
            </div>
            <div class="most-recent">
                <h3>Most Recent</h3>
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <a href="#">
                    <div class="aside-article">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>
                    </a>
                <?php } ?>
            </div>
            <div class="newsletter">
                <h3>Sign up for Daily Bubls</h3>
                <span class="newsletter-info">A newsletter that offers bite-sized articles discussing various fields in the area of technology.</span>
                <form class="signup-form" action="">
                    <input type="email" name="signup-email" id="signup-email" placeholder="Email Address">
                    <button>Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <span class="footer-text">©2023, TechBubl</span>
    </footer>
</body>

</html>
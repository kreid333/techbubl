<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="public/assets/js/scripts.js" defer></script>
    <title>Document</title>
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
    <?php require("$area/$name.view.php") ?>
</body>

</html>
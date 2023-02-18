<!-- HOME -->
<div class="icon-wrapper">
    <a href="/" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<!-- ARTICLE -->
<div class="article">
    <div class="article__header">
        <h1 class="article__title"><?php echo $data["post"]["title"]; ?></h1>
        <span class="article__author"><?php echo $data["post"]["first_name"] . " " . $data["post"]["last_name"]; ?></span>
        <span class="article__date"><?php echo $data["post"]["date_formatted"]; ?></span>
    </div>
    <div class="article__body">
        <?php echo $data["post"]["body"]; ?>
    </div>
    <span class="article__category"><?php echo $data["post"]["name"]; ?></span>
</div>
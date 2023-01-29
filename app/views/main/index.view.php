<!-- POSTS NAV -->
<div class="posts-nav">
    <div class="posts-nav__categories">
        <a class="posts-nav__btn" href="#">
            Cryptocurrency
        </a>
        <a class="posts-nav__btn" href="#">
            Web Development
        </a>
        <a class="posts-nav__btn" href="#">
            Artificial Intelligence
        </a>
    </div>
    <div class="post-sorting sorting">
        <select name="sortby">
            <option value="most-recent">SORT BY: Most Recent</option>
            <option value="most-popular">SORT BY: Most Popular</option>
        </select>
    </div>
</div>

<!-- POSTS GRID -->
<div class="posts-grid">
    <?php for ($i = 0; $i < 12; $i++) { ?>
        <a href="#">
            <div class="post">
                <div class="post__author">
                    <img class="post__author-img" src="public/assets/images/NoUser.svg" alt="Placeholder">
                    <span class="post__author-name">Izzy Cantella</span>
                </div>
                <div class="post__content">
                    <h4 class="post__title">My first ever post!</h4>
                    <p class="post__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim veniam sed rem quod quaerat fuga deleniti consequuntur tempore obcaecati expedita reiciendis officia id ullam minus nulla, unde qui quasi quo? Corporis vero dolorum explicabo? Repudiandae, eum! Sapiente unde esse atque, soluta error libero modi quia cum rerum beatae suscipit autem magni repudiandae sunt, laudantium itaque architecto alias eos explicabo ad.</p>
                </div>
                <div class="post__info">
                    <span class="post__category">Artificial Intelligence</span>
                    <span class="post__info--seperator">·</span>
                    <span class="post__read-time">6 mins</span>
                </div>
            </div>
        </a>
    <?php } ?>
</div>
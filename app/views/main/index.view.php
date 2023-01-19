<div class="post-nav">
    <div class="categories">
        <a href="#">
            <button class="category-btn">Cryptocurrency</button>
        </a>
        <a href="#">
            <button class="category-btn">Web Development</button>
        </a>
        <a href="#">
            <button class="category-btn">Artificial Intelligence</button>
        </a>
    </div>
    <div class="sorting">
        <select name="sortby" id="sortby" class="sortby">
            <option value="most-recent">SORT BY: Most Recent</option>
            <option value="most-popular">SORT BY: Most Popular</option>
        </select>
    </div>
</div>

<div class="post-grid">
    <?php for ($i = 0; $i < 12; $i++) { ?>
        <a href="#">
            <div class="post-card">
                <div class="post-author">
                    <img class="post-author_img" src="public/assets/images/NoUser.svg" alt="Placeholder">
                    <span class="post-author_name">Izzy Cantella</span>
                </div>
                <div class="post-content">
                    <h4 class="post-title">My first ever post!</h4>
                    <p class="post-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim veniam sed rem quod quaerat fuga deleniti consequuntur tempore obcaecati expedita reiciendis officia id ullam minus nulla, unde qui quasi quo? Corporis vero dolorum explicabo? Repudiandae, eum! Sapiente unde esse atque, soluta error libero modi quia cum rerum beatae suscipit autem magni repudiandae sunt, laudantium itaque architecto alias eos explicabo ad.</p>
                </div>
                <div class="post-info">
                    <span class="post-category">Artificial Intelligence</span>
                    <span class="seperator">·</span>
                    <span class="post-read_time">6 mins</span>
                </div>
            </div>
        </a>
    <?php } ?>
</div>
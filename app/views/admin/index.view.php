<!-- SETTINGS -->
<div class="icon-wrapper">
    <a href="/admin/settings" class="settings-icon">
        <i class="fa fa-cog"></i>
    </a>
</div>

<!-- AUTHOR -->
<div class="author">
    <h1 class="author__name">Kai Reid</h1>
    <h2 class="author__role">Admin</h2>
</div>

<!-- SEARCH BAR -->
<div class="admin-search search-bar">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" name="post-search" placeholder="Search">
</div>

<!-- SORTING -->
<div class="admin-sorting sorting">
    <select name="sortby">
        <option value="date">SORT BY: Date</option>
        <option value="author">SORT BY: Author</option>
    </select>
</div>


<!-- ADMIN ACTIONS -->
<div class="admin-actions">
    <a class="btn btn--white" href="#">CREATE NEW POST</a>
    <a class="btn btn--white" href="#">CREATE NEW EDITOR</a>
    <a class="btn btn--white" href="#">VIEW EDITORS</a>
</div>

<!-- ADMIN GRID -->
<div class="admin-grid">
    <?php for ($i = 0; $i < 6; $i++) { ?>
        <div class="admin-post">
            <div class="admin-post__info">
                <span class="admin-post__title">My first ever post!</span>
                <span class="admin-post__author">By Izzy Cantella</span>
                <span class="admin-post__date">Posted on 1/28/23</span>
            </div>
            <div class="admin-post__actions">
                <a class="btn btn--white" href="#">EDIT POST</a>
                <a class="btn btn--black" href="#">DELETE POST</a>
            </div>
        </div>
    <?php } ?>
</div>
<!-- MODAL -->
<div class="modal">
    <div class="modal__card">
        <span class="modal__question">Are you sure you want to delete this post?</span>
        <span class="modal__post-title">My first post!</span>
        <span class="modal__post-author">By Izzy Cantalla</span>
        <span class="modal__post-date">Posted on 1/23/23</span>
        <a class="modal__delete btn btn--black" href="/admin/deletepost?id=1">DELETE</a>
        <a class="modal__cancel" href="/admin">CANCEL</a>
    </div>
</div>

<!-- SETTINGS -->
<div class="icon-wrapper">
    <a href="/admin/settings" class="settings-icon">
        <i class="fa fa-cog"></i>
    </a>
</div>

<!-- AUTHOR -->
<div class="author">
    <h1 class="author__name"><?php echo $data["user"]["first_name"]; echo " "; echo $data["user"]["last_name"]; ?></h1>
    <h2 class="author__role"><?php echo $data["user"]["role"]; ?></h2>
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
    <a class="btn btn--white" href="/admin/createpost">CREATE POST</a>
    <?php if ($data["user"]["role"] == "Admin") { ?>
    <a class="btn btn--white" href="/admin/createeditor">CREATE EDITOR</a>
    <a class="btn btn--white" href="/admin/vieweditors">VIEW EDITORS</a>
    <?php } ?>
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
                <a class="btn btn--white" href="/admin/editpost?id=1">EDIT POST</a>
                <button class="delete-btn btn btn--black" data-id="1">DELETE POST</a>
            </div>
        </div>
    <?php } ?>
</div>
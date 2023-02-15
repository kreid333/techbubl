<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="editeditor">
    <!-- EDIT EDITOR HEADER -->
    <h1 class="editeditor-header">EDIT EDITOR</h1>

    <!-- EDIT EDITOR FORM -->
    <form class="editeditor-form" action="/admin/editeditor?id=<?php echo $_GET["id"]; ?>" method="POST">
        <div class="editeditor-form__name-field">
            <div class="editeditor-form__input-field">
                <label for="first-name">First Name</label>
                <input name="first-name" type="text" value="<?php echo $data["user"]["first_name"]; ?>">
            </div>
            <div class="editeditor-form__input-field">
                <label for="last-name">Last Name</label>
                <input name="last-name" type="text" value="<?php echo $data["user"]["last_name"]; ?>">
            </div>
        </div>
        <div class="editeditor-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="text" value="<?php echo $data["user"]["email"]; ?>">
        </div>
        <button type="submit" class="btn btn--black editeditor__submit-btn">UPDATE</button>
    </form>
</div>
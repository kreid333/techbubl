<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="createeditor">
    <!-- CREATE EDITOR HEADER -->
    <h1 class="createeditor-header">CREATE EDITOR</h1>

    <!-- CREATE EDITOR FORM -->
    <form class="createeditor-form" action="/admin/createeditor" method="POST">
        <input type="hidden" name="role" value="Editor">
        <div class="createeditor-form__name-field">
            <div class="createeditor-form__input-field">
                <label for="first-name">First Name</label>
                <input name="first-name" type="text" placeholder="First Name">
            </div>
            <div class="createeditor-form__input-field">
                <label for="last-name">Last Name</label>
                <input name="last-name" type="text" placeholder="Last Name">
            </div>
        </div>
        <div class="createeditor-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="text" placeholder="Email Address">
        </div>
        <button type="submit" class="btn btn--black createeditor__submit-btn">CREATE</button>
    </form>

    <?php if (isset($data["err"])) { ?>
        <p class="err"> <?php echo $data["err"]; ?> </p>
    <?php } ?>

    <?php if (isset($data["success"])) { ?>
        <p class="success"> <?php echo $data["success"]; ?> </p>
    <?php } ?>
</div>
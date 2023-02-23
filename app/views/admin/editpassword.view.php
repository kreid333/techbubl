<div class="password">
    <!-- EDIT PASSWORD HEADER -->
    <h2 class="password-header">EDIT PASSWORD</h2>

    <!-- EDIT PASSWORD FORM -->
    <form class="password-form" action="/admin/settings/editpassword" method="POST">
        <div class="password-form__input-field">
            <label for="old-password">Old Password</label>
            <input name="old-password" type="password" placeholder="Old Password">
        </div>
        <div class="password-form__input-field">
            <label for="new-password">New Password</label>
            <input name="new-password" type="password" placeholder="New Password">
        </div>
        <div class="password-form__input-field">
            <label for="confirm-new-password">Confirm New Password</label>
            <input name="confirm-new-password" type="password" placeholder="Confirm New Password">
        </div>
        <button type="submit" class="btn btn--black password__submit-btn">UPDATE</button>
    </form>
    <a class="password__cancel" href="/admin/settings">GO BACK</a>

    <?php if (!empty($data["err"])) { ?>
        <p class="publish-err"><?php echo $data["err"]; ?></p>
    <?php } ?>

    <?php if (!empty($data["success"])) { ?>
        <p class="publish-err"><?php echo $data["success"]; ?></p>
    <?php } ?>
</div>
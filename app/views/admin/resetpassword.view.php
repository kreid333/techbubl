<div class="resetpassword">
    <!-- RESET PASSWORD HEADER -->
    <h1 class="resetpassword-header">RESET PASSWORD</h1>

    <!-- RESET PASSWORD FORM -->
    <form class="resetpassword-form" action="/admin/resetpassword?c=<?php echo $_GET["c"]; ?>" method="POST">
        <div class="verifyaccount-form__input-field">
            <label for="new-password">New Password</label>
            <input name="new-password" type="password" placeholder="New Password">
        </div>
        <div class="verifyaccount-form__input-field">
            <label for="confirm-password">Confirm Password</label>
            <input name="confirm-password" type="password" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn--black resetpassword-form__submit-btn">SUBMIT</button>
    </form>

    <?php if (isset($data["err"])) { ?>
        <p class="err"><?php echo $data["err"];  ?></p>
    <?php } ?>
</div>
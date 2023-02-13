<div class="verifyaccount">
    <!-- VERIFY ACCOUNT HEADER -->
    <span class="verifyaccount-header">To verify your account, please create a password</span>

    <!-- VERIFY ACCOUNT FORM -->
    <form class="verifyaccount-form" action="/admin/verifyaccount?c=<?php echo $_GET["c"]; ?>" method="POST">
        <div class="verifyaccount-form__input-field">
            <label for="create-password">Create Password</label>
            <input name="create-password" type="password" placeholder="Create Password">
        </div>
        <div class="verifyaccount-form__input-field">
            <label for="confirm-password">Confirm Password</label>
            <input name="confirm-password" type="password" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn--black verifyaccount-form__submit-btn">SUBMIT</button>
    </form>

    <?php if (!empty($data["password_err"])) { ?>
        <p><?php echo $data["password_err"];  ?></p>
    <?php } ?>
</div>
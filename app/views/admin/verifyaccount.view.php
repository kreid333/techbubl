<div class="verifyaccount">
    <!-- VERIFY ACCOUNT HEADER -->
    <span class="verifyaccount-header">To verify your account, please create a password</span>

    <!-- VERIFY ACCOUNT FORM -->
    <form class="verifyaccount-form" action="/admin/verifyaccount?vc=<?php echo $_GET["vc"]; ?>" method="POST">
        <div class="verifyaccount-form__input-field">
            <label for="email-address">Create Password</label>
            <input name="create-password" type="password" placeholder="Create Password">
        </div>
        <div class="verifyaccount-form__input-field">
            <label for="password">Confirm Password</label>
            <input name="confirm-password" type="password" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn--black verifyaccount-btn">SUBMIT</button>
    </form>

    <?php if (!empty($data["password_err"])) { ?>
        <p><?php echo $data["password_err"];  ?></p>
    <?php } ?>

    <?php if (!empty($data["success"])) { ?>
        <p><a href="/admin/login">Click here to login</a></p>
    <?php } ?>
</div>
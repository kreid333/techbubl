<div class="forgotpassword">
    <!--  FORGOT PASSWORD HEADER -->
    <h1 class="forgotpassword-header">FORGOT PASSWORD</h1>
    <span class="forgotpassword-info">Please enter the email address you'd like your password reset information sent to</span>

    <!-- FORGOT PASSWORD FORM -->
    <form class="forgotpassword-form" action="/admin/forgotpassword" method="POST">
        <div class="forgotpassword-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="email" placeholder="Email Address">
        </div>
        <button type="submit" class="btn btn--black forgotpassword__submit-btn">REQUEST RESET LINK</button>
    </form>

    <a class="go-back" href="/admin/login">GO BACK</a>

    <?php if (isset($data["err"])) { ?>
        <p class="err"><?php echo $data["err"]; ?></p>
    <?php } ?>

    <?php if (isset($data["success"])) { ?>
        <p class="success"><?php echo $data["success"]; ?></p>
    <?php } ?>

</div>
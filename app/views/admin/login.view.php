<div class="login">
    <!-- LOGIN HEADER -->
    <h1 class="login-header">LOGIN</h1>

    <!-- LOGIN FORM -->
    <form class="login-form" action="/admin/login" method="POST">
        <div class="login-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="text" placeholder="Email Address">
        </div>
        <div class="login-form__input-field">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn--black login-form__submit-btn">SUBMIT</button>
        <?php if (!empty($data["password_err"])) { ?>
            <p class="login-err"><?php echo $data["password_err"];  ?></p>
        <?php } ?>
        <?php if (!empty($data["email_err"])) { ?>
            <p class="login-err"><?php echo $data["email_err"];  ?></p>
        <?php } ?>
        <?php if (!empty($data["login_err"])) { ?>
            <p class="login-err"><?php echo $data["login_err"];  ?></p>
        <?php } ?>
    </form>
</div>
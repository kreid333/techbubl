<div class="login">
    <!-- LOGIN HEADER -->
    <h1 class="login-header">LOGIN</h1>

    <!-- LOGIN FORM -->
    <form class="login-form" action="/admin/login" method="POST">
        <div class="login-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="email" placeholder="Email Address">
        </div>
        <div class="login-form__input-field">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn--black login__submit-btn">SUBMIT</button>
    </form>

    <a class="forgot-password" href="/admin/forgotpassword">Forgot password?</a>

    <?php if (isset($data["err"])) { ?>
        <p class="login-err"><?php echo $data["err"];  ?></p>
    <?php } ?>
</div>
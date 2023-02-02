<!-- HOME -->
<div class="icon-wrapper">
    <a href="/admin" class="home-icon">
        <i class="fa fa-house"></i>
    </a>
</div>

<div class="settings">
    <!-- INFO HEADER -->
    <h2 class="info-header">EDIT INFO</h2>

    <!-- INFO FORM -->
    <form class="info-form" action="">
        <div class="info-form__name-field">
            <div class="info-form__input-field">
                <label for="first-name">First Name</label>
                <input name="first-name" type="text" placeholder="First Name">
            </div>
            <div class="info-form__input-field">
                <label for="last-name">Last Name</label>
                <input name="last-name" type="text" placeholder="Last Name">
            </div>
        </div>
        <div class="info-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="text" placeholder="Email Address">
        </div>
        <button type="submit" class="btn btn--black login-form__submit-btn">UPDATE</button>
    </form>

    <!-- BREAKS -->
    <br>
    <br>

    <!-- PASSWORD HEADER -->
    <h2 class="password-header">EDIT PASSWORD</h2>

    <!-- PASSWORD FORM -->
    <form class="password-form" action="">
        <div class="password-form__input-field">
            <label for="email-address">Old Password</label>
            <input name="email-address" type="text" placeholder="Old Password">
        </div>
        <div class="password-form__input-field">
            <label for="password">New Password</label>
            <input name="password" type="password" placeholder="New Password">
        </div>
        <button type="submit" class="btn btn--black login-form__submit-btn">UPDATE</button>
    </form>
</div>
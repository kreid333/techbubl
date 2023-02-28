<div class="info">
    <!-- EDIT INFO HEADER -->
    <h2 class="info-header">EDIT INFO</h2>

    <!-- EDIT INFO FORM -->
    <form class="info-form" action="/admin/settings/editinfo" method="POST">
        <div class="info-form__name-field">
            <div class="info-form__input-field">
                <label for="first-name">First Name</label>
                <input name="first-name" type="text" value="<?php echo $data["user"]["first_name"]; ?>">
            </div>
            <div class="info-form__input-field">
                <label for="last-name">Last Name</label>
                <input name="last-name" type="text" value="<?php echo $data["user"]["last_name"]; ?>">
            </div>
        </div>
        <div class="info-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="text" value="<?php echo $data["user"]["email"]; ?>">
        </div>
        <button type="submit" class="btn btn--black info__submit-btn">UPDATE</button>
    </form>
    <a class="go-back" href="/admin/settings">GO BACK</a>
    <?php if (isset($data["err"])) { ?>
        <p class="err"><?php echo $data["err"]; ?></p>
    <?php } ?>
</div>
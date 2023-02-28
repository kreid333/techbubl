<div class="container">
    <!-- CONTACT HEADER -->
    <div class="contact-header">
        <h1>CONTACT US</h1>
        <p>If you have any questions, concerns, or messages for us, please feel free to contact us.</p>
    </div>

    <!-- CONTACT FORM -->
    <form class="contact-form" action="/contact" method="POST">
        <div class="contact-form__name-field">
            <div class="contact-form__input-field">
                <label for="first-name">First Name</label>
                <input name="first-name" type="text" placeholder="First Name" required>
            </div>
            <div class="contact-form__input-field">
                <label for="last-name">Last Name</label>
                <input name="last-name" type="text" placeholder="Last Name" required>
            </div>
        </div>
        <div class="contact-form__input-field">
            <label for="email-address">Email Address</label>
            <input name="email-address" type="email" placeholder="Email Address" required>
        </div>
        <div class="contact-form__input-field">
            <label for="message">Message</label>
            <textarea name="message" cols="30" rows="10" placeholder="Message" required></textarea>
        </div>
        <button type="submit" class="btn btn--black contact-form__submit-btn">SUBMIT</button>
    </form>
</div>

<?php if (isset($data["err"])) { ?>
    <span class="err"><?php echo $data["err"]; ?></span>
<?php } ?>

<?php if (isset($data["success"])) { ?>
    <span class="success"><?php echo $data["success"]; ?></span>
<?php } ?>
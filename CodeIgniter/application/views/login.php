<form class="pure-form pure-form-stacked" action="" method="post">
    <fieldset>
        <legend>Log you here !</legend>

        <label for="email">Name</label>
        <input name="InputName" id="InputName" type="text" placeholder="Name">

        <label for="password">Password</label>
        <input name="InputPwd" id="InputPwd" type="password" placeholder="Password">

        <button type="submit" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
</form>

<?php if(isset($message) && $message != "") : ?>
<div class="alert alert-danger">
    <?= $message; ?>
</div>
<?php endif; ?>

<div class="center">
    Pas encore de compte ? <a href=<?= site_url("/user/register"); ?>>Inscrivez-vous !</a>
</div>
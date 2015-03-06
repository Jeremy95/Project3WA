<form class="pure-form pure-form-aligned" action="" method="post">
        <legend>Register you here !</legend>
    <fieldset>
        <div class="pure-control-group">
            <label for="name">Username</label>
            <input name="userName" id="name" type="text" placeholder="Username">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input name="userPwd" id="password" type="password" placeholder="Password">
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input name="userEmail" id="email" type="email" placeholder="Email Address">
        </div>

        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>

<?php if(isset($message) && $message != "") : ?>
    <div class="alert alert-danger">
        <?= $message; ?>
    </div>
<?php endif; ?>
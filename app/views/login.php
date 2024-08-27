<h2>Login</h2>

<?php echo getFlash('message') ?>

<form action="/login" method="POST" class="box-login">
    <fieldset>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email">
    </fieldset>

    <fieldset>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Your password">
    </fieldset>

    <button type="submit">Submit</button>
</form>
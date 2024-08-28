<h2>Register</h2>

<form action="/user/store" method="POST" class="box-register">

    <div class="box-name-and-last-name">
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="name" name="name" placeholder="Your first name">
            <?php echo getFlash('firstName'); ?>
        </div>

        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="name" placeholder="Your last name">
            <?php echo getFlash('lastName'); ?>
        </div>
    </div>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Your e-mail">
    <?php echo getFlash('email'); ?>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Your password">
    <?php echo getFlash('password'); ?>
    <button type="submit">Submit</button>
</form>
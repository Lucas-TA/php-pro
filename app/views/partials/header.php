<ul class="menu_list">
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/user/create">Create</a></li>
</ul>

<div class="status_login">
    Welcome,
    <?php if (logged()) : ?>
        <?php echo user()->firstName; ?> | <a href="/logout">Logout</a>
    <?php else: ?>
        Guest
    <?php endif; ?>
</div>

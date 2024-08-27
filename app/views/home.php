<h2>Users</h2>

<ul class="users-home">
    <?php foreach ($users as $user): ?>
        <li><?php echo $user->firstName; ?> | <a href="/user/<?php echo $user->id; ?>">Ver detalhes</a></li>
    <?php endforeach; ?>
</ul>
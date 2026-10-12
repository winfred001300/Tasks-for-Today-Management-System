<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today - Welcome</title>
</head>
<body>

    <h1>Tasks for Today Management System</h1>

    <p>Welcome! This system helps you organize and manage your daily tasks.</p>

    <nav>
        <a href="<?= site_url('home/view') ?>">Welcome</a> |
        <a href="<?= site_url('tasks') ?>">Task List</a> |
        <a href="<?= site_url('profile') ?>">Profile</a> |
        <a href="<?= site_url('about') ?>">About</a>
    </nav>

    <hr>

    <h2>Welcome to Your Daily Task Manager</h2>

    <p>
        Use this system to view your tasks, stay organized,
        and keep track of your daily activities.
    </p>

    <p>
        You can browse the public pages without logging in.
        Logging in allows you to create, edit, and manage tasks.
    </p>

    <?php if (session()->get('isLoggedIn')): ?>
        <p>
            You are logged in as
            <strong><?= esc(session()->get('username')) ?></strong>.
        </p>
        <p><a href="<?= site_url('logout') ?>">Log Out</a></p>
    <?php else: ?>
        <p><a href="<?= site_url('login') ?>">Log In to Manage Tasks</a></p>
    <?php endif; ?>

</body>
</html>

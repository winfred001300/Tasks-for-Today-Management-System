<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Tasks for Today</title>
</head>
<body>

    <h1>My Profile</h1>

    <nav>
        <a href="<?= site_url('home/view') ?>">Welcome</a> |
        <a href="<?= site_url('tasks') ?>">Task List</a> |
        <a href="<?= site_url('profile') ?>">Profile</a> |
        <a href="<?= site_url('about') ?>">About</a>
    </nav>

    <hr>

    <h2>Account Information</h2>

    <p>
        <strong>Username:</strong>
        <?= esc(session()->get('username') ?? 'Not available') ?>
    </p>

    <p>
        <strong>Account Status:</strong>
        Logged In
    </p>

    <p>
        This is your profile page for the Tasks for Today
        Management System.
    </p>

    <p>
        <a href="<?= site_url('tasks') ?>">Return to Task List</a>
    </p>

    <p>
        <a href="<?= site_url('logout') ?>">Log Out</a>
    </p>

</body>
</html>

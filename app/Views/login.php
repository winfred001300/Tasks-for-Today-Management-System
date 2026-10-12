<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today - Login</title>
</head>
<body>
    <h1>Tasks for Today Management System</h1>
    <p>Please log in to create, edit, and manage your tasks.</p>

    <?php if (service('request')->getGet('logged_out') === '1'): ?>
        <p style="color: green;">
            You have been logged out successfully.
        </p>
    <?php endif; ?>

    <?php $error = session()->getFlashdata('error'); ?>
    <?php if ($error): ?>
        <p style="color: red;">
            <?= esc($error) ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="username">Username:</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                required
                autofocus
            >
        </div>

        <br>

        <div>
            <label for="password">Password:</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit">Log In</button>
    </form>
</body>
</html>

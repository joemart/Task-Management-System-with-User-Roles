<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System with User Roles</title>
    <link rel="stylesheet" type="text/css" href="./views/home/home.css">
</head>
<body>
    <nav class="navbar">
        <div>Home</div>
        <ul class="navbar_account">

            <!-- If not logged in -->
             <?php if (!false): ?>
            <li>Log in</li>
            <li>Register</li>
            <?php endif; ?>

            <!-- If logged in -->
            <?php if (!true): ?>
            <li>Log out</li>
            <li>Account</li>
            <?php endif; ?>
        </ul>
    </nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System with User Roles</title>
    <?php foreach($cssFiles as $cssFile): ?>
    <link rel="stylesheet" type="text/css" href="./views/<?= $cssFile ?>">
    <?php endforeach; ?>
</head>
<body>
    <nav class="navbar">
        <div>
            <a class="slider home_button" href="/">
                <img src="public/images/home.svg" alt="">
                <span>Home</span>
            </a>
        </div>
        <ul class="navbar_account">

            <!-- If not logged in -->
             <?php if (!false): ?>
            <li class = "navbar_link_container"><a class="slider navbar_link" href="/login">Log in</a></li>
            <li class = "navbar_link_container"><a class="slider navbar_link" href="/register">Register</a></li>

            <?php endif; ?>

            <!-- If logged in -->
            <?php if (!true): ?>
            <li class = "navbar_link_container"><a class="slider navbar_link" href="/logout">Log out</a></li>
            <li class = "navbar_link_container"><a class="slider navbar_link" href="/account">Account</a></li>
            <?php endif; ?>
        </ul>
    </nav>
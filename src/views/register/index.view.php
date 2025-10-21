<?php 
$cssFiles = ["register/index.css", "layout.css"];
require_once('./includes/header.php'); ?>

    <form class="register" method="POST" action="./index.view.php">
        Registration
        <ul>
            <li><input type="text" placeholder="Username" name="username"></li>
            <li><input type="text" placeholder="Password" name="password"></li>
            <li><input type="text" placeholder="Email" name="email"></li>
            <li><input type="text" placeholder="Name" name="name"></li>
        </ul>
        <button type="submit">Submit</button>
    </form>

    <?= $_POST["username"] ?>

<?php require_once('./includes/footer.php'); ?>
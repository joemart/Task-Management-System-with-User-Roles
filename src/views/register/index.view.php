<?php 

$cssFiles = ["register/register.css", "layout.css"];
require_once('./includes/header.php'); 


?>

    <div class="container">

        <form class="register" method="POST" action="/register-form">
            <span class="register_text">Registration</span>
            <ul>
                <li><input type="text" placeholder="Username" name="username"></li>
                <?= $_SESSION["validation_errors"]["username"] ?? null ?>
                <li><input type="password" placeholder="Password" name="password" ></li>
                <?= $_SESSION["validation_errors"]["password"] ?? null ?>
                <li><input type="text" placeholder="Email" name="email"></li>
                <?= $_SESSION["validation_errors"]["email"] ?? null ?>
                <li><input type="text" placeholder="Name" name="name"></li>
                <?= $_SESSION["validation_errors"]["name"] ?? null ?>
            </ul>
            <button type="submit">Submit</button>

            <span class="register_acc_text">Already have an account? <a href="/login">Log in</a></span>
        </form>
        
    </div>


<?php require_once('./includes/footer.php'); ?>
<?php 

$cssFiles = ["register/register.css", "layout.css"];
require_once('./includes/header.php'); 


?>

    <div class="container">

        <form class="register" method="POST" action="/register-form">
            <span class="register_text">Registration</span>
            <ul class="register_form">
                <li><input type="text" placeholder="Username" name="username"></li>
                <span><?= $_SESSION["validation_errors"]["username"] ?? null ?></span>
                <li><input type="password" placeholder="Password" name="password" ></li>
                <span><?= $_SESSION["validation_errors"]["password"] ?? null ?></span>
                <li><input type="text" placeholder="Email" name="email"></li>
                <span><?= $_SESSION["validation_errors"]["email"] ?? null ?></span>
                <li><input type="text" placeholder="Name" name="name"></li>
                <span><?= $_SESSION["validation_errors"]["name"] ?? null ?></span>
            </ul>
            <button type="submit">Submit</button>

            <span class="register_acc_text">Already have an account? <a href="/login">Log in</a></span>
        </form>
        
    </div>


<?php require_once('./includes/footer.php'); ?>
<?php 

$cssFiles = ["forms.css", "layout.css"];
require_once('./includes/header.php'); 


?>

    <div class="container">

        <form class="form" method="POST" action="/register-form">
            <span class="form_text">Registration</span>
            <ul class="form_list">
                <li><input type="text" placeholder="Username" name="username"></li>
                <span><?= $_SESSION["validation_errors"]["username"] ?? null ?></span>
                <li><input type="password" placeholder="Password" name="password" ></li>
                <span><?= $_SESSION["validation_errors"]["password"] ?? null ?></span>
                <li><input type="text" placeholder="Email" name="email"></li>
                <span><?= $_SESSION["validation_errors"]["email"] ?? null ?></span>
                <li><input type="text" placeholder="Name" name="name"></li>
                <span><?= $_SESSION["validation_errors"]["name"] ?? null ?></span>
            </ul>
            <button type="submit">Create account</button>

            <span class="form_acc_text">Already have an account? <a href="/login">Log in</a></span>
        </form>
        
    </div>


<?php require_once('./includes/footer.php'); ?>
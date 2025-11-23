<?php 

$cssFiles = ["forms.css", "layout.css"];
require_once('./includes/header.php'); 


?>

    <div class="container">

        <form class="form" method="POST" action="/login-form">
            <span class="form_text">Log in</span>
            <ul class="form_list">
                <li><input type="text" placeholder="Username" name="username"></li>
                <li><input type="text" placeholder="Email" name="email"></li>
                <li><input type="password" placeholder="Password" name="password"></li>
            </ul>
            <button type="submit">Log in</button>
            <?= $_SESSION["login_errors"] ?? "" ?>
            <span class="form_acc_text">Don't have an account? <a href="/register">Register</a></span>
        </form>
        
    </div>


<?php require_once('./includes/footer.php'); ?>
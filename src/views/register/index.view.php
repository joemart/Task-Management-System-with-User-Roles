<?php 

$cssFiles = ["register/register.css", "layout.css"];
require_once('./includes/header.php'); 



?>

    <div class="container">

        <form class="register" method="POST" action="/register-form">
            <span class="register_text">Registration</span>
            <ul>
                <li><input type="text" placeholder="Username" name="username"></li>
                <li><input type="password" placeholder="Password" name="password" ></li>
                <li><input type="text" placeholder="Email" name="email"></li>
                <li><input type="text" placeholder="Name" name="name"></li>
            </ul>
            <button type="submit">Submit</button>

            <span class="register_acc_text">Already have an account? <a href="/login">Log in</a></span>
        </form>
        
    </div>


    <?= isset($_POST["username"]) ?? null ?>

<?php require_once('./includes/footer.php'); ?>
<?php 

$cssFiles = ["forms.css", "layout.css"];
require_once('./includes/header.php'); 


?>

    <div class="container">

        <form class="form" method="POST" action="/login-form">
            <span class="form_text">Registration</span>
            <ul class="form_list">
                <li><input type="text" placeholder="Username" name="username"></li>
                <li><input type="text" placeholder="Email" name="email"></li>
                <li><input type="password" placeholder="Password" name="password"></li>
            </ul>
            <button type="submit">Submit</button>

            <span class="form_acc_text">Already have an account? <a href="/login">Log in</a></span>
        </form>
        
    </div>


<?php require_once('./includes/footer.php'); ?>
<?php 

declare(strict_types=1);

function signup_inputs() {
            if (isset($_SESSION["signup_data"]["username"]) && !isset(
                $_SESSION["errors_signup"]["username_taken"])
            ) {
                echo '<div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" 
                id="username" placeholder="Username" value= "' . $_SESSION["signup_data"]["username"] . '">
                </div>';
            } else {
                echo '<div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" 
                id="username" placeholder="Username">
                </div>';
            }

            echo '<div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="pwd" 
            id="password" placeholder="Password">
            </div>';

            if (isset($_SESSION["signup_data"]["email"]) && !isset(
                $_SESSION["errors_signup"]["email_used"])
            && !isset($_SESSION["errors_signup"]["invalid_email"])) {
                echo '<div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" 
                id="email" placeholder="E-mail" value= "' . $_SESSION["signup_data"]["email"] . '" >
                </div>';
            } else {
                echo '<div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" 
                id="email" placeholder="E-mail">
                </div>';
            }
}

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET["signup"] === 
    "success") {
        echo '<br>';
        echo '<p class="form-success">Signup success!</p>';
    }
}
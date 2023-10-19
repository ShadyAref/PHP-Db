<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/login_view.inc.php';
    include "../includes/header.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login-signup.css">
    <title>Login</title>
</head>
<body>
<div class="container mt-4">
        <h3 class="text-center">Login</h3>
        <form action="../includes/login.inc.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="pwd" id="password" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-center">Login</button>
            </div>
        </form>
</div>

<?php
check_login_errors();
?>
</body>
</html>


<?php
    include "../includes/footer.inc.php";
?>


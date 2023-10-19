<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/signup_view.inc.php';
    include "../includes/header.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login-signup.css">
    <title>Signup</title>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Signup</h3>
        <form action="../includes/signup.inc.php" method="post">
            <?php
            signup_inputs();
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-center">Signup</button>
            </div>
        </form>
    </div>

    <?php
        check_signup_errors();
    ?>
</body>
</html>

<?php
    include "../includes/footer.inc.php" 
?>


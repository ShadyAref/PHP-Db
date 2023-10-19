<?php 
include "../includes/header.inc.php" 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
</head>
<body>
    <div class="home-container">
        <?php
            require_once '../includes/config_session.inc.php';
            // Check if user is logged in
            if (isset($_SESSION['user_username'])) {
                echo '<div class="user-details d-flex flex-column align-items-center">';
                echo 'Welcome: <span class="text-primary">' . $_SESSION['user_username'] . '</span>';
                echo 'Your Balance is: <span class="text-success">$' . $_SESSION['user_balance'] . '</span>';
                echo '</div>';
            }
        ?>
    </div>
    
</body>
</html>

<?php include "../includes/footer.inc.php" ?> 
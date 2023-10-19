<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/header.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="header">
    <a href="#default" class="logo">Books Store</a>
    <div class="header-center">
        <a href="../pages/home.php">Home</a>
        <a href="../pages/about.php">About</a>
    </div>
    <div class="user-actions">
        <?php
        require_once '../includes/config_session.inc.php';
        // Check if user is logged in
        if (isset($_SESSION['user_username'])) {

        // User is logged in

            $balance = $_SESSION['user_balance']; 

             // profile link with logo
            echo '<div class="user-profile">';
            echo '<a href="../pages/user-profile.php" class="profile-link">';
            echo '<img src="https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/person-circle.svg" class="profile-icon img-fluid rounded-circle" style="width: 30px; height: 30px;">';
            echo '</a>';
            echo '</div>';

            // balance 
            echo '<div class="user-balance d-flex align-items-center">';
            echo '<span class="icon">&#x1F4B0;</span>'; 
            echo 'Balance: $' . $balance;
            echo '</div>';

            // cart
            echo '<a class="btn btn-primary ml-3" href="../pages/shopping-cart.php">';
            echo '<span class="icon">&#x1F6D2;</span>'; 
            echo 'Cart';
            echo '</a>';

            // logout option
            echo '<a class="btn btn-primary ml-3" href="../pages/logout.php">';
            echo 'Logout';
            echo '</a>';
            } else {

            // User is not logged in
            echo '<a class="btn" href="../pages/login.php">';
            echo 'Login';
            echo '</a>';

            echo '<a class="btn ml-1" href="../pages/signup.php">';
            echo 'Signup';
            echo '</a>';
            }
        ?>
    </div>
</div>

</body>
</html>

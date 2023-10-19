<?php include "../includes/header.inc.php" ?>

<?php
// Retrieve the total cost from the session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['total_cost'])) {
    $totalCost = (float)$_POST['total_cost'];

    // Update the balance
    require_once '../includes/config_session.inc.php';
    require_once '../includes/dbh.inc.php';
    // Check if user is logged in
    if (isset($_SESSION['user_username'])) {

        if (isset($balance)) { 
            $balance -= $totalCost;

            $updateSql = "UPDATE users SET balance = :balance WHERE username = :username";
            $stmt = $pdo->prepare($updateSql);
            $stmt->bindParam(':balance', $balance, PDO::PARAM_STR);
            $stmt->bindParam(':username', $_SESSION['user_username'], PDO::PARAM_STR);
            $stmt->execute();
    }
    }

    // Clear the cart
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
}

?>

<!DOCTYPE html>
<html>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title">Checkout Success</h1>
                <p>Your balance has been updated. New balance: <?php echo '$' . number_format($balance, 2); ?></p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a class="home-link" href="home.php">Back to home page -></a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>

<?php include "../includes/footer.inc.php" ?>
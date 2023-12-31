<?php include "../includes/header.inc.php" ?>

<?php
require_once '../includes/config_session.inc.php';
// Check if the cart exists in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add a book to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $bookId = $_POST['book_id'];

    // Increment the quantity of the book in the cart
    if (isset($_SESSION['cart'][$bookId])) {
        $_SESSION['cart'][$bookId]++;
    } else {
        // Add the book to the cart with a quantity of 1
        $_SESSION['cart'][$bookId] = 1;
    }
}

// Remove a book from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_book_id'])) {
    $bookId = $_POST['remove_book_id'];

    // Remove the book from the cart array
    unset($_SESSION['cart'][$bookId]);
}

// Retrieve the book details from the session and calculate the total cost
function displayCartItems()
{
    $totalCost = 0;

    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
    } else {
        echo '<ul class="cart-items">';
        foreach ($_SESSION['cart'] as $bookId => $quantity) {
                // find the book that has clicked to display
                include "../includes/books.model.php";
                foreach ($books as $book) {
                if ($book['bookid'] == $bookId) {
                    echo '<li><span class="title">' . $book['bookname'] . '</span> - <span class="price">' . $book['bookprice'] . '</span> (Quantity: ' . $quantity . ')';
                    echo '<form method="post"><input type="hidden" name="remove_book_id" value="' . $bookId . '"><button type="submit" class=" btn-primary remove-button">Remove</button></form></li>';
                    $totalCost += getPriceValue($book['bookprice']) * $quantity;
                }
        }
        }
        echo '</ul>';
    }
    echo '<p class="total-cost">Total Cost: ' . formatPrice($totalCost) . '</p>';
    echo '<form method="post" action="../pages/checkout.php">';
    echo '<input type="hidden" name="total_cost" value="' . $totalCost . '">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-md-6 text-center">';
    echo '<button type="submit" class="btn btn-primary">Checkout</button>';
    echo '</div>';
    echo '</div>';
    echo '</form>';
}

// extract the numeric value from the price string
function getPriceValue($price)
{
    return (float) preg_replace('/[^0-9.]/', '', $price);
}

// format the price with dollar sign and two decimal places
function formatPrice($price)
{
    return '$' . number_format($price, 2);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title">Your Cart</h1>
                <div>
                    <h2>Cart Items:</h2>
                    <?php displayCartItems(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a class="home-link" href="../pages/home.php">Back to home page -></a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>

<?php include "../includes/footer.inc.php" ?>
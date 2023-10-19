<?php include "../includes/header.inc.php" ?>

<!DOCTYPE html>
<html>
<head>
<title>Book Details</title>
<link rel="stylesheet" href="../CSS/book-details.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

<?php
            if (isset($_GET['book'])) {
                $bookId = $_GET['book'];
                // Find the book that has clicked to display
                include "../includes/books.model.php";

                foreach ($books as $book) {
                    if ($book['bookname'] == $bookId) {
                    echo '
                    <div class="book-details">
                        <img src="' . $book['bookimage'] . '" class="card-img-top" alt="' . $book['bookname'] . '">
                        <div class="book-extra-details">
                            <h1>' . $book['bookname'] . '</h1>
                            <h4>By : ' . $book['bookauthor'] . '</h4>
                            <p>' . $book['bookdescription'] . '</p>
                            <h6>Price: ' . $book['bookprice'] . '</h6>';
                                require_once '../includes/config_session.inc.php';
                                // Check if user is logged in
                                if (isset($_SESSION['user_username'])) {
                                    // Ratings
                                    echo '<form method="post">
                                            <label for="rating">Rate:</label>
                                            <select name="rating" id="rating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <input type="submit" value="Submit-Rating">
                                        </form>';

                                // Add to cart button
                                    echo '<form action="../pages/shopping-cart.php" method="post">
                                            <input type="hidden" name="book_id" value="' . $book['bookid'] . '">
                                            <input type="submit" value="Add to Cart">
                                        </form>';
                                } else {
                                    echo '<p>Rate: ' . $book['bookrate'] . '</p>';
                                }
                            }
            }
            }

?>
    </div>
    </div>
</div>
</body>
</html>

<?php include "../includes/footer.inc.php" ?>
<?php 
include "../includes/header.inc.php" 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="home-container">
        <?php
            include "../includes/books.model.php";
            foreach ($books as $book) {
                echo '<div class="col-md-2 books">
                        <div class="card book-card">
                            <img src="' . $book['bookimage'] . '" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">' . $book['bookname'] . '</h5>
                                <p class="card-text">Price: ' . $book['bookprice'] . '</p>
                                <p class="card-text">Rate: ' . $book['bookrate'] . '</p>
                                <a href="../pages/book-details.php?book=' . $book['bookname'] . '" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>';
            }
        ?>
    </div>
    
</body>
</html>

<?php include "../includes/footer.inc.php" ?> 
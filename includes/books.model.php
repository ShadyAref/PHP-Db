<?php
$host = 'localhost';
$dbname = 'login';
$dbusername = 'root';
$dbpassword = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$query = "SELECT * FROM books";
$stmt = $conn->prepare($query);
$stmt->execute();

$books = array(); // Create an empty array to store books

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $book = array(
        'bookname' => $row['bookname'],
        'bookimage' => $row['bookimage'],
        'bookrate' => $row['bookrate'],
        'bookprice' => $row['bookprice'],
        'bookid' => $row['id'],
        'bookauthor' => $row['author'],
        'bookdescription' => $row['description'],
    );
    $books[] = $book; // Add each book to the array
}
?>
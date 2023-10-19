<?php
$social_links = array(
"twitter" => "https://twitter.com",
"linkedin" => "https://linkedin.com",
"facebook" => "https://facebook.com",
"instagram" => "https://instagram.com",
);


$social_icons = array(
"twitter" => "https://cdn-icons-png.flaticon.com/512/124/124021.png",
"linkedin" => "https://cdn-icons-png.flaticon.com/512/174/174857.png",
"facebook" => "https://cdn-icons-png.flaticon.com/512/124/124010.png",
"instagram" => "https://cdn-icons-png.flaticon.com/512/174/174855.png",
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css">
</head>
<body>
    <footer class="footer">
        <div class="social-icons">
            <?php foreach ($social_links as $key => $value) { ?>
                <a href="<?php echo $value; ?>" target="_blank">
                    <img src="<?php echo $social_icons[$key]; ?>" alt="<?php echo $key; ?>">
                </a>
            <?php } ?>

            <p class="footer_paragraph">© 2023 Books Store. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

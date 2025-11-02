<?php
include 'connection.php';
$sql = "SELECT img, title, descr, price FROM item";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
    <link rel="stylesheet" href="index.css">
</head>
<header>
    <ul class="header-item-container"><a href="index.php"><img id="logo" src="media/logo.png"></a></ul>

    <ul class="header-item-container2">
        <a id="here" class="link" href="index.php">Home</a>
        <a class="link" href="about.html">About</a>
        <a class="link" href="about.html">Menu</a>
        <a class="link" href="about.html">Contact</a>
    </ul>
</header>

<body>
    <?php
    // Loop through each row and display as a card
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
        <div class='card'>
        <img class='item-img' src='{$row['img']}'>
        <h class = 'title'>{$row['title']}</h>
        <p class = 'price'>R{$row['price']}.00</p>
         <button type='submit' class='btn-add'>Add to Cart</button>
        </div>
        ";
        }
    } else {
        echo "<p>No items found.</p>";
    }

    $conn->close();
    ?>
</body>
<footer>
    <section class="section-1">
        <p>VAAL UNIVERSITY OF TECHNOLOGY CAFETERIA</p>
    </section>

    <section class="section-2">
        <p>Address<br>
            Andries Potgieter Boulevard<br>
            Vanderbijlpark<br>
            1911<br>
            South Africa
        </p>
    </section>

    <section class="section-2">
        <p>CONTACT<br>
            vutcafe@Vut.ac.za<br>
            +27 67 993 3441</p>
    </section>

    <section class="section-2">
        <p>Follow us on social media:</p>
        <div class="icons">
            <a href="#"><i class="fab fa-facebook-f"></i> VUT Cafeteria</a><br>
            <a href="#"><i class="fab fa-instagram"></i> vut_cafeteria</a><br>
            <a href="#"><i class="fab fa-twitter"></i> vut_cafeteria</a>
        </div>
    </section>

    <hr>

    <section class="section-4">
        <p class = "copywrite">© 2025 Green Campus Initiative</p>
    </section>

</footer>
</html>
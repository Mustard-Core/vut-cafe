<?php
include 'connection.php';

$sql = "SELECT cart.id, item.title, item.price, cart.quantity 
        FROM cart
        JOIN item ON cart.item_id = item.item_id";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<header>
    <ul class = "header-item-container"><a href = "index.php"><img id = "logo" src = "media/logo.png"></a></ul>

    <ul class = "header-item-container2">
        <a id = "here" class = "link" href = "index.php">Home</a>
        <a  class = "link" href = "about.html">About</a>
        <a class = "link" href = "about.html">Menu</a>
        <a class = "link" href = "about.html">Contact</a>
    </ul>
</header>



<body>

    <h2>🍔 Menu</h2>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
            <img src="<?= $row['img'] ?>" alt="">
            <h3><?= $row['title'] ?></h3>
            <p><?= $row['descr'] ?></p>
            <span>R<?= $row['price'] ?></span><br><br>

            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="item_id" value="<?= $row['item_id'] ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    <?php } ?>

    <a href="cart.php">🛒 View Cart</a>

</body>

<footer>

    <section class="section-1">
        <p>VAAL UNIVERSITY OF TECHNOLOGY CAFETERIA</p>
    </section>

    <section class = "section-2">
        <p>Address<br>
            Andries Potgieter Boulevard<br>
            Vanderbijlpark<br>
            1911<br>
            South Africa
        </p>
    </section>

    <section class = "section-2">
       <p>CONTACT<br>
        vutcafe@Vut.ac.za<br>
        +27 67 993 3441</p>
    </section>

    <section class = "section-2">
<p>Follow us on social media:</p>
                <div class="icons">
                    <a href="#"><i class="fab fa-facebook-f"></i> VUT Cafeteria</a><br>
                    <a href="#"><i class="fab fa-instagram"></i> vut_cafeteria</a><br>
                    <a href="#"><i class="fab fa-twitter"></i> vut_cafeteria</a>
                </div>
    </section>


    <hr>


    <section class="section-4">
        <p>© 2025 Green Campus Initiative</p>
    </section>

</footer>
</html>
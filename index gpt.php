<?php
// connect to DB
include 'connection.php';

// fetch items
$result = $conn->query("SELECT * FROM item");
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

    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
            <img class = "item-img" src="<?= $row['img'] ?>" alt="">
            <h3 class = "title"><?= $row['title'] ?></h3>
            <p class = "price">R<?= $row['price'] ?></p><br><br>

            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="item_id" value="<?= $row['item_id'] ?>">
                <button class = "btn-add" type="submit">Add to Cart</button>
            </form>
        </div>
    <?php } ?>

    <hr>
    <button class = "btn-view-cart" ><a class = "view-cart" href="cart.php">🛒 View Cart</a></button>
    <button class = "btn-view-cart" ><a class = "view-cart" href="cart.php">🛒 View Cart</a></button>


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
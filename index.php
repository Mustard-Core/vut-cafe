<?php
include 'connection.php';
$sql = "SELECT img, title, descr, price FROM item";
$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html>

<head>
    <title>Menu Items</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    // Loop through each row and display as a card
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
        <div class='card'>
            <div class='image-placeholder'>
                <img class='item-img' src='{$row ['img']}'>
            </div>
            <h3>{$row['title']}</h3>
            <p>{$row['descr']}</p>
            <span class='price'>R{$row['price']}</span>
             <button type='submit' class='add-btn'>Add to Cart</button>
        </div>
        ";
        }
    } else {
        echo "<p>No items found.</p>";
    }

    $conn->close();
    ?>

</body>

</html>
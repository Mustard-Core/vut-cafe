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

</html>
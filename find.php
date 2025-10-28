<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_number   = $_POST['id_number'];
    $id_name     = $_POST['id_name'];
    $id_surname  = $_POST['id_surname'];

    $sql = "SELECT finder_name, finder_surname, finder_phone_number, finder_email_address
            FROM lost_id
            WHERE id_number = ? AND id_name = ? AND id_surname = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id_number, $id_name, $id_surname);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Finder Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            text-align: center;
            padding: 20px;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 60%;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-record {
            background: #ffe5e5;
            color: #cc0000;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Finder Details</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Finder Name</th><th>Finder Surname</th><th>Phone Number</th><th>Email</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['finder_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['finder_surname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['finder_phone_number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['finder_email_address']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='no-record'>No record found.</div>";
    }
    ?>
</body>
</html>
<?php
    $stmt->close();
    $conn->close();
}
?>
